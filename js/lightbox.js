/**
 * Lightbox for post/page content images.
 *
 * Handles two markups WordPress produces for content images:
 *  - "Link to: Media File" — an <a> wrapping the <img>, pointing at a
 *    specific generated thumbnail size (e.g. image-30-677x390.png) on the
 *    origin server.
 *  - "Link to: None" — a bare <img>, no wrapping <a> at all.
 *
 * Either way, this opens the full-resolution original in an overlay,
 * served through ImageKit (matching the CDN this site already uses for
 * responsive srcset) instead of the small origin-server thumbnail.
 */
( function () {
	'use strict';

	/**
	 * Given a WordPress-generated image URL, return the full-resolution
	 * version served through ImageKit instead of the origin server.
	 *
	 * @param {string} url e.g. "https://abdullahyahya.com/wp-content/uploads/2026/08/image-30-677x390.png"
	 * @return {string} e.g. "https://ik.imagekit.io/dumani/wp-content/uploads/2026/08/image-30.png"
	 */
	function getFullSizeImageUrl( url ) {
		// Strip WordPress's generated "-WIDTHxHEIGHT" size suffix to get back
		// to the original, full-resolution filename.
		var fullPath = url.replace( /-\d+x\d+(?=\.\w+(?:\?.*)?$)/, '' );

		// Route through the ImageKit CDN (same endpoint used for this site's
		// responsive srcset) instead of the raw origin upload. Matches both
		// the production and staging domain, since only the host differs.
		// A no-op if the URL is already an ik.imagekit.io one (e.g. picked up
		// via img.currentSrc from a srcset candidate).
		return fullPath.replace(
			/^https?:\/\/[^/]*abdullahyahya\.com/,
			'https://ik.imagekit.io/dumani'
		);
	}

	function isImageUrl( url ) {
		return !! url && /\.(jpe?g|png|gif|webp)(\?.*)?$/i.test( url );
	}

	function isImageLink( link ) {
		return link.children.length === 1 &&
			link.children[ 0 ].tagName === 'IMG' &&
			isImageUrl( link.href );
	}

	function openLightbox( imageUrl, altText ) {
		var overlay = document.createElement( 'div' );
		overlay.className = 'lightbox-overlay';
		overlay.setAttribute( 'role', 'dialog' );
		overlay.setAttribute( 'aria-modal', 'true' );

		var img = document.createElement( 'img' );
		img.className = 'lightbox-image';
		img.src = imageUrl;
		img.alt = altText || '';

		var closeBtn = document.createElement( 'button' );
		closeBtn.className = 'lightbox-close';
		closeBtn.setAttribute( 'aria-label', 'Close' );
		closeBtn.innerHTML = '&times;';

		overlay.appendChild( img );
		overlay.appendChild( closeBtn );
		document.body.appendChild( overlay );
		document.body.classList.add( 'lightbox-open' );

		function close() {
			overlay.remove();
			document.body.classList.remove( 'lightbox-open' );
			document.removeEventListener( 'keydown', onKeydown );
		}

		function onKeydown( e ) {
			if ( e.key === 'Escape' ) {
				close();
			}
		}

		overlay.addEventListener( 'click', function ( e ) {
			if ( e.target === overlay || e.target === closeBtn ) {
				close();
			}
		} );
		document.addEventListener( 'keydown', onKeydown );

		// Trigger the fade-in on the next frame so the initial state paints first.
		requestAnimationFrame( function () {
			overlay.classList.add( 'is-visible' );
		} );
	}

	document.addEventListener( 'DOMContentLoaded', function () {
		// Upgrade wrapped-image links up front, so "open in new tab" /
		// "copy link" / no-JS fallback all get the full-size ImageKit URL too.
		document.querySelectorAll( '.entry-content a' ).forEach( function ( link ) {
			if ( isImageLink( link ) ) {
				link.href = getFullSizeImageUrl( link.href );
			}
		} );
	} );

	document.addEventListener( 'click', function ( e ) {
		var img = e.target.closest( '.entry-content img' );
		if ( ! img ) {
			return;
		}

		var link = img.closest( 'a' );
		// Prefer the (already-upgraded) anchor href if this image is linked;
		// otherwise fall back to whichever srcset candidate the browser
		// actually rendered.
		var sourceUrl = ( link && isImageLink( link ) ) ? link.href : ( img.currentSrc || img.src );

		if ( ! isImageUrl( sourceUrl ) ) {
			return;
		}

		e.preventDefault();
		openLightbox( getFullSizeImageUrl( sourceUrl ), img.alt );
	} );
} )();
