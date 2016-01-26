<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title">Bok: <?php the_title();?><small><?php if(get_field('volym'))
{echo ', volym ' . get_field('volym') . ' av ' . get_field('antal_volymer') . '';}  ?></small></h1>
	</header><!-- .entry-header -->

	<?php twentysixteen_excerpt(); ?>

	<?php twentysixteen_post_thumbnail(); ?>
	
	<div class="entry-content">
			<?php

if(the_field('omslag'))
{
	echo '<div class="omslagsbild"><img src="' . the_field('omslag') . '" alt="' . the_title('') . '" /></div>';
}
?>
	<div class="laddaner">
	<h3>Ladda ner e-bok:</h3>
<?php

if(get_field('pdf'))
{
	echo '<a href="' . get_field('pdf') . '" alt="Ladda ner PDF" class="btn btn-primary btn-block">.pdf</a>';
}
if(get_field('epub'))
{
	echo '<a href="' . get_field('epub') . '" alt="Ladda ner EPUB" class="btn btn-primary btn-block">.epub</a>';
}
if(get_field('mobi'))
{
	echo '<a href="' . get_field('mobi') . '" alt="Ladda ner MOBI" class="btn btn-primary btn-block">.mobi</a>';
}
?>
</div>
<?php
			the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
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
