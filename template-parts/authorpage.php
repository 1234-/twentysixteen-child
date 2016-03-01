<?php
/**
 * The template part for displaying an Author biography
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<div class="author-info">
	<div class="author-avatar">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 150 ); ?>
	</div><!-- .author-avatar -->

	<div class="author-description">
	<div class="fb-like" data-href="<?php echo get_permalink(); ?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
		<p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
		</p><!-- .author-bio -->
	</div><!-- .author-description -->
</div><!-- .author-info -->