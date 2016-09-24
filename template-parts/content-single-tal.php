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
	<div class="fb-like" data-href="<?php echo get_permalink(); ?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
		<h1 class="entry-title">Tal: <?php the_title();?></h1>
	</header><!-- .entry-header -->

	<?php twentysixteen_excerpt(); ?>
	
	<div class="entry-content">
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
	<span class="byline">Talare: <a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php echo get_the_author(); ?></a></span>
		<?php
if(get_field('datum'))
{
	echo '<span class="bokmeta">Datum: ' . get_field('datum') . '</span>';
}
if(get_field('plats'))
{
	echo '<span class="bokmeta">Plats: ' . get_field('plats') . '</span>';
} ?>
<span class="bokmeta">Digitaliserad av: <a href="http://projektmoberg.se">Projekt Moberg</a></span>
<hr/>
<p xmlns:dct="http://purl.org/dc/terms/">
<a rel="license" href="http://creativecommons.org/publicdomain/mark/1.0/">
<img src="http://i.creativecommons.org/p/mark/1.0/88x31.png"
     style="border-style: none;" alt="Public Domain Mark" />
</a>
<br />
<small>Detta verk (<span property="dct:title"><?php the_title( ); ?></span>, av <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="dct:creator"><span property="dct:title"><?php the_author( ); ?></span></a>), gjort tillgängligt av <a href="http://projektmoberg.se/" rel="dct:publisher"><span property="dct:title">Projekt Moberg</span></a>, är allmän egendom och får spridas och användas fritt.</small>
</p>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
