<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
global $post;
$author_id=$post->post_author;
?>
<aside id="secondary" class="sidebar sidebar-bok widget-area" role="complementary">
<section id="omforfattaren" class="widget">
<div class="sidebar-author-avatar" style="float:right;">
		<?php echo get_avatar( $author_id, $size, $default, $alt, $args ); ?>
</div>
		<h2 class="widget-title"><small>Om författaren:</small><br/><?php the_author_meta( 'display_name', $author_id );?></h2>
<div class="textwidget">
	<h5>Levde: <?php the_author_meta( 'fodd' ); ?> - <?php the_author_meta( 'dod' ); ?><br/>
	Födelseort: <?php the_author_meta( 'ort' ); ?></h5>
		<p class="author-bio"> <?php  if (function_exists('author_excerpt')){echo author_excerpt();} ?></p>
		<p><a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				Se alla böcker av <?php echo get_the_author(); ?>
			</a>
		</p>
</div>
</section>
<section id="" class="widget">
<h2 class="widget-title">Citat:</h2>
<div class="textwidget">
<blockquote><?php the_author_meta( 'citat' ); ?></blockquote>
</div>
</section>
</aside>