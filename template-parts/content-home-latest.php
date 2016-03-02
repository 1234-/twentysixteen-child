<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<div class="col-md-4">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php _e( 'Featured', 'twentysixteen' ); ?></span>
		<?php endif; ?>
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->
<footer class="entry-footer">
<?php $post_type = get_post_type_object( get_post_type($post) );
echo $post_type->labels->singular_name; ?>
		<span class="byline">Författare: <?php the_author_posts_link(); ?></span>
		<?php
if(get_field('utgiven'))
{
	echo '<span class="bokmeta">Utgiven: ' . get_field('utgiven') . '</span>';
}
?>
	</footer><!-- .entry-footer -->
<?php the_excerpt(); ?>
</article><!-- #post-## -->
</div>