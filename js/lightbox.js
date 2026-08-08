/**
 * Lightbox for post/page content images.
 *
 * WordPress wraps "linked to media file" images in an <a> pointing at a
 * specific generated thumbnail size (e.g. image-30-677x390.png) served from
 * the origin server. That's smaller than most screens and skips the
 * ImageKit CDN entirely. This rewrites those links to the full-resolution
 * original, served through ImageKit (matching the CDN this site already
 * uses for responsive srcset), and opens it in an overlay instead of
 * navigating away.
 */
( function () {
	'use strict';

	/**
	 * Given a WordPress-generated image URL, return the full-resolution
	 * version served through ImageKit instead of the origin server.
	 *
	 * @param {string} href e.g. "https://abdullahyahya.com/wp-content/uploads/2026/08/image-30-677x390.png"
	 * @return {string} e.g. "https://ik.imagekit.io/dumani/wp-content/uploads/2026/08/image-30.png"
	 */
	function getFullSizeImageUrl( href ) {
		// Strip WordPress's generated "-WIDTHxHEIGHT" size suffix to get back
		// to the original, full-resolution filename.
		var fullPath = href.replace( /-\d+x\d+(?=\.\w+(?:\?.*)?$)/, '' );

		// Route through the ImageKit CDN (same endpoint used for this site's
		// responsive srcset) instead of the raw origin upload. Matches both
		// the production and staging domain, since only the host differs.
		return fullPath.replace(
			/^https?:\/\/[^/]*abdullahyahya\.com/,
			'https://ik.imagekit.io/dumani'
		);
	}

	function isImageLink( link ) {
		if ( ! link.href || link.children.length !== 1 ) {
			return false;
		}
		var child = link.children[ 0 ];
		return child.tagName === 'IMG' && /\.(jpe?g|png|gif|webp)(\?.*)?$/i.test( link.href );
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
		// Upgrade every matching link's href up front, so "open in new tab" /
		// "copy link" / no-JS fallback all get the full-size ImageKit URL too.
		document.querySelectorAll( '.entry-content a' ).forEach( function ( link ) {
			if ( isImageLink( link ) ) {
				link.href = getFullSizeImageUrl( link.href );
			}
		} );
	} );

	document.addEventListener( 'click', function ( e ) {
		var link = e.target.closest( '.entry-content a' );
		if ( ! link || ! isImageLink( link ) ) {
			return;
		}

		e.preventDefault();
		openLightbox( link.href, link.children[ 0 ].alt );
	} );
} )();
