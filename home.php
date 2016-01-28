<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<div class="home-boxes">
<div class="row">
<div class="col-md-4">
<div class="box-padding">
<h3>Välkommen!</h3>
<p>Nyfiken på vad vi gör? <b>Projekt Moberg</b> digitaliserar <a href="http://projektmoberg.se/vilka-bocker-kommer-att-digitaliseras/">gamla böcker</a> som skildrar det svenska och de övriga nordiska folkens liv genom tiderna. Vi har just kommit igång med bevarandet av vårt kulturarv, så vi har en spännande tid framför oss!</p>
</div>
</div>
<div class="col-md-4">
<div class="box-padding">
<h3>Biblioteket</h3>
<p>I <a href="http://projektmoberg.se/bibliotek/">biblioteket</a> kommer du kunna hitta de böcker som har eller håller på att digitaliseras av Projekt Moberg och andra digitaliseringsprojekt; böcker om livet i Norden och om folken som levt här genom årtusendena.</p>
</div>
</div>
<div class="col-md-4">
<div class="box-padding">
<h3>Hjälp till</h3>
<p>Att digitalisera vårt kulturarv är ett enormt arbete. Vi har inga statliga miljoner bakom oss utan allt sker med idéella krafter. Du kommer snart kunna stötta oss med både tid och pengar. Tills dess, följ oss <a href="https://www.facebook.com/ProjektMoberg/">på Facebook</a>!</p>
</div>
</div>
</div>
</div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<h2 style="margin-bottom:30px;">Från bloggen:</h2>
		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-home' );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
