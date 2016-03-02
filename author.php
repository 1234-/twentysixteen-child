<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<?php 
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>
<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<?php get_template_part( 'template-parts/authorpage' );?>
			<?php $args = array(
    'post_type' => 'bok' ,
    'author' => get_queried_object_id(), // this will be the author ID on the author page
    'showposts' => 10
);
$bok_posts = new WP_Query( $args );
$args2 = array(
    'post_type' => 'dikt' ,
    'author' => get_queried_object_id(), // this will be the author ID on the author page
    'showposts' => 10
);
$diktposts = new WP_Query( $args2 );
$args3 = array(
    'post_type' => 'post' ,
    'author' => get_queried_object_id(), // this will be the author ID on the author page
    'showposts' => 10
);
$posts = new WP_Query( $args3 );
if ( $bok_posts->have_posts() ):
echo '<h2 class="skrivetav">Böcker av ' . get_the_author() .':</h2>';
    while ( $bok_posts->have_posts() ) : $bok_posts->the_post();
        get_template_part( 'template-parts/content-author' );
    endwhile;
else:
    // nothing found
endif;?>
<?php
if ( $diktposts->have_posts() ):
echo '<h2 class="skrivetav">Utvalda dikter av ' . get_the_author() .':</h2>';
			// Start the Loop.
			while ( $diktposts->have_posts() ) : $diktposts->the_post();
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-author-dikt' );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );

		endif;
		?>
		<?php
if ( $posts->have_posts() ):
echo '<h2 class="skrivetav">Texter av ' . get_the_author() .':</h2>';
			// Start the Loop.
			while ( $posts->have_posts() ) : $posts->the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-author' );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );

		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
