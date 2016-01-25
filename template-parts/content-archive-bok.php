<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php _e( 'Featured', 'twentysixteen' ); ?></span>
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<?php twentysixteen_post_thumbnail(); ?>

	<div class="entry-content">
		<?php twentysixteen_excerpt(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php twentysixteen_entry_meta(); ?>
		<span class="byline">Författare: <a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php echo get_the_author(); ?></a></span>
		<?php

if(get_field('utgiven'))
{
	echo '<span class="bokmeta">Utgiven: ' . get_field('utgiven') . '</span>';
}
if(get_field('upplaga'))
{
	echo '<span class="bokmeta">Upplaga: ' . get_field('upplaga') . '</span>';
}
if(get_field('volym'))
{
	echo '<span class="bokmeta">Volym: ' . get_field('volym') . ' av ' . get_field('antal_volymer') . '</span>';
}
?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
