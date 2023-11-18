<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
			?>
	</header><!-- .entry-header -->

	<footer class="entry-footer">
		<?php twentyfifteen_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
	
	<?php
		// Post thumbnail.
		twentyfifteen_post_thumbnail();
	?>

	<div class="entry-content">
		<?php
			the_content(
				sprintf(
					/* translators: %s: Post title. */
					__( 'Continue reading %s', 'twentyfifteen' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				)
			);

			wp_link_pages(
				array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				)
			);
			?>
		
		<?php if (has_tag('islam')): ?>
			<h2>Related articles</h2>
<ul>
<li><a href="http://www.abdullahyahya.com/2019/09/proof-muslim-women-dont-have-to-cover-their-hair/">Proof Muslim Women Don’t Have to Cover Their Hair</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/proof-hadith-not-valid-islamic-law/">Proof the Hadith is Not Valid Islamic Law</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/muslims-are-performing-the-hajj-wrong/">Muslims Are Performing the Hajj Wrong</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/muslims-are-wrong-about-zakat/">Muslims Are Wrong About Zakat</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/lailat-al-qadr-is-not-what-you-think-it-is/">Lailat Al-Qadr Is Not What You Think It Is</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/most-muslims-fast-incorrectly-during-ramadan/">Most Muslims Start & End Fasting At the Wrong Time</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/islamic-misconceptions-about-the-call-to-prayer-adhaan/">Islamic Misconceptions About the Call to Prayer (Adhaan)</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/most-muslims-are-wrong-about-various-aspects-of-prayer/">Most Muslims Are Wrong About Various Aspects of Prayer</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/islamic-ablution-is-simpler-than-most-people-think/">Islamic Ablution (Wudhu) Is Simpler Than Many Muslims Think</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/muslims-dont-need-to-perform-ablution-wudhu-before-touching-the-quran/">Muslims Don’t Need to Perform Ablution (Wudhu) Before Touching the Quran</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/studying-and-understanding-the-quran-is-required-deferring-matters-of-islamic-law-to-others-is-not-permissible/">Deferring Matters of Islamic Law to Religious Scholars Is Not Permissible. Studying and Understanding the Quran is Required.</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/the-quran-is-complete-the-hadith-books-are-not-needed-to-complete-the-quran-proof/">Proof That the Quran Is Complete and That the Hadith Books Are Not Needed</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/prayer-among-jews-christians-and-muslims-a-quranic-analysis/">Prayer Among Jews, Christians, and Muslims – A Quranic Analysis</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/the-testimony-shahadah-to-convert-to-islam-is-inaccurate/">The Testimony (Shahadah) to Convert to Islam is Inaccurate</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/categories-of-people-according-to-the-quran/">Categories of People According to the Quran</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/jews-and-christians-are-actually-muslims/">Jews and Christians Are Actually Muslims</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/abraham-not-muhammad-was-the-founder-of-islam/">Abraham, Not Muhammad, Was the Founder of Islam</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/jewish-christian-and-islamic-scriptures/">Jewish, Christian and Islamic Scriptures</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/the-fallacy-that-descendants-of-prophet-muhammad-are-superior-to-everyone-else/">The Fallacy That Descendants of Prophet Muhammad Are Superior to Everyone Else</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/the-difference-between-islamic-prophets-and-messengers/">Islamic Prophets, Messengers & Scriptures</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/what-is-gods-name-a-quranic-analysis/">What is God’s Name – A Quranic Analysis</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/aliens-do-exist-a-quranic-analysis/">Aliens Do Exist – A Quranic Analysis</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/most-muslims-are-asian-not-arab/">Most Muslims Are Asian, Not Arab</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/proof-that-relatives-wives-children-descendants-etc-of-islamic-prophets-including-muhammad-are-not-automatically-righteous/">Proof That Relatives (Wives, Children, Descendants, etc) of Islamic Prophets, Including Muhammad, Are Not Automatically Righteous</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/there-is-no-punishment-for-blasphemy-in-islam/">There Is No Punishment for Blasphemy in Islam</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/proof-that-arabic-is-not-a-holy-or-superior-language/">Proof That Arabic is Not a Holy or Superior Language</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/proof-that-prophet-muhammad-is-not-exclusive-or-superior-to-other-prophets/">Proof That Prophet Muhammad Is Not Exclusive or Superior to Other Prophets</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/muslims-submitters-and-mumins-believers-are-not-the-same-thing/">Muslims (Submitters) and Mu’mins (Believers) Are Not the Same Thing</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/most-jews-christians-and-polytheists-are-not-infidels-kafir/">Most Jews, Christians, and Polytheists Are Not Infidels (Kafir)</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/there-is-no-quranic-proof-that-zamzam-water-is-blessed-holy-water/">There Is No Quranic Proof That Zamzam Water Is Blessed Holy Water</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/muslims-are-not-allowed-to-force-others-to-practice-islam-so-why-do-people-islamic-governments-keep-doing-it/">Muslims Are Not Allowed To Force Others To Practice Islam. So Why Do Muslims & Islamic Governments Keep Doing It?</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/if-you-are-a-sunni-or-shia-muslim-then-youve-violated-islamic-law/">If You Are a Sunni or Shia Muslim, Then You’ve Violated Islamic Law</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/contrary-to-extremist-belief-muslims-are-allowed-to-sing-and-listen-to-music/">Contrary to Extremist Belief, Muslims Are Allowed To Sing and Listen to Music</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/muslims-are-allowed-to-have-statues-and-photos-of-people-in-their-homes/">Muslims Are Allowed To Have Statues and Photos of People in Their Homes</a></li>			
<li><a href="http://www.abdullahyahya.com/2019/09/dogs-arent-impure-muslims-are-allowed-to-have-pet-dogs/">Dogs Aren’t Impure. Muslims Are Allowed to Have Pet Dogs.</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/muslims-are-allowed-to-pay-interest-e-g-on-a-car-or-home-loan/">Muslims Are Allowed to Pay Interest, e.g. on a Car or Home Loan</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/prophet-muhammad-was-not-illiterate-he-could-read-and-write/">Prophet Muhammad Was Not Illiterate. He Could Read and Write.</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/jesus-is-dead-he-aint-comin-back-a-quranic-analysis/">Jesus is Dead & He Ain’t Comin’ Back – A Quranic Analysis</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/many-muslims-are-wrong-about-getting-help-from-others-on-the-day-of-judgment/">Many Muslims Are Wrong About Getting Help From Others on the Day of Judgment</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/wills-and-inheritance-law-according-to-the-quran/">Wills and Inheritance Law According to the Quran</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/most-muslims-are-wrong-about-halal-food/">Most Muslims Are Wrong About Halal Food</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/circumcision-is-not-required-among-muslim-boys-men/">Circumcision Is Not Required Among Muslim Boys / Men</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/yes-muslim-women-are-also-required-to-pray-the-friday-prayer-in-congregation/">Muslim Women Are Not Exempt From Congregational Friday Prayers</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/muslim-women-are-not-exempt-from-fasting-praying-etc-during-menstruation/">Muslim Women Are Not Exempt From Fasting, Praying, etc During Menstruation</a></li>
<li><a href="http://www.abdullahyahya.com/2020/09/the-quran-doesnt-support-a-strictly-vegetarian-diet/">The Quran Doesn’t Support a Strictly Vegetarian Diet</a></li>
<li><a href="http://www.abdullahyahya.com/2019/08/summary-of-the-quran/">Summary of the Quran</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/proof-hadith-not-valid-islamic-law-ar/">إثبات أن الحديث ليس شرعاً إسلامياً صالحاً</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/proof-muslim-women-dont-have-to-cover-their-hair-ar/">إثبات أن النساء المسلمات لسن بحاجة لتغطية شعرهم</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/bukti-hadits-tidak-valid-hukum-islam/">Bukti Hadits Tidak Valid Hukum Islam</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/kekeliruan-bahwa-keturunan-nabi-muhammad-lebih-unggul-dari-semua-orang-lain/">Kekeliruan Bahwa Keturunan Nabi Muhammad Lebih Unggul Dari Semua Orang Lain</a></li>
<li><a href="http://www.abdullahyahya.com/2019/09/bukti-wanita-muslim-tidak-harus-menutup-rambutnya-dengan-hijab/">Bukti Wanita Muslim Tidak Harus Menutup Rambutnya Dengan Hijab</a></li>
</ul>
		<?php endif; ?>
	</div><!-- .entry-content -->

	<?php
	// Author bio.
	if ( is_single() && get_the_author_meta( 'description' ) ) :
		get_template_part( 'author-bio' );
		endif;
	?>	

</article><!-- #post-<?php the_ID(); ?> -->
