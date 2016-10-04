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
		<h1 class="entry-title">Bok: <?php the_title();?></h1>
	</header><!-- .entry-header -->

	<?php twentysixteen_excerpt(); ?>
	
	<div class="entry-content">
	<div class="laddaner">
	<?php
	if(get_field('pdf')) {
	echo '<h3>Ladda ner e-bok:</h3>';
	}
	elseif(get_field('epub')) {
	echo '<h3>Ladda ner e-bok:</h3>'; }
	elseif(get_field('mobi')) {
	echo '<h3>Ladda ner e-bok:</h3>'; }
	else {
	echo '<h3>Status: Digitalisering pågår</h3><p>Den här boken håller på att digitaliseras. När den är redo kommer du kunna ladda ner den här. Anmäl dig till vårt nyhetsbrev för att få veta när den släpps.</p>';
	}

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
			get_template_part( 'template-parts/emailbottombox' );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php twentysixteen_entry_meta(); ?>
	<span class="byline">Författare: <a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php echo get_the_author(); ?></a></span>
		<?php
if(get_field('oversattare_user'))
{
	echo '<span class="bokmeta">Översättare: <a class="author-link" href="http://projektmoberg.se/author/' . get_field('oversattare_user') . '/">'. get_field('oversattare_namn') .'</a></span>';
}

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
if(get_field('digitaliserad_av'))
{
	echo '<span class="bokmeta">Digitaliserad av: <a href="';
	echo the_field('digitaliserad_av_url');
	echo '">' . get_field('digitaliserad_av') . '</a></span>';
}
?>
<hr/>
<?php
if(get_field('licens') == "publicdomain")
{ ?>
<p xmlns:dct="http://purl.org/dc/terms/">
<a rel="license" href="http://creativecommons.org/publicdomain/mark/1.0/">
<img src="http://i.creativecommons.org/p/mark/1.0/88x31.png"
     style="border-style: none;" alt="Public Domain Mark" />
</a>
<br />
<small>Detta verk (<span property="dct:title"><?php the_title( ); ?></span>, av <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="dct:creator"><span property="dct:title"><?php the_author( ); ?></span></a>), gjort tillgängligt av <a href="http://projektmoberg.se/" rel="dct:publisher"><span property="dct:title">Projekt Moberg</span></a>, är allmän egendom och får spridas och användas fritt.</small>
</p>
<?php } elseif(get_field('licens') == "cc-by-nc-sa")
{?>
<p xmlns:dct="http://purl.org/dc/terms/">
<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/2.5/se/">
                    <img src="http://projektmoberg.se/wp-content/uploads/2016/03/cc-by-nc-sa-80x15.png" style="border-style: none;" alt="CC-BY-NC-SA">
</a>
<br />
<small>Detta verk (<span property="dct:title"><?php the_title( ); ?></span>, av <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="dct:creator"><span property="dct:title"><?php the_author( ); ?></span></a>), gjort tillgängligt av <a href="<?php the_field('digitaliserad_av_url') ?>" rel="dct:publisher"><span property="dct:title"><?php the_field('digitaliserad_av') ?></span></a>, är licensierat med <a href="https://creativecommons.org/licenses/by-nc-sa/2.5/se/">CC BY-NC-SA</a> licens och får delas fritt, med några villkor.</small>
</p>
<?php } ?>

	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
