<?php
function theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function new_excerpt_length($length) {
	return 30;
}
add_filter('excerpt_length', 'new_excerpt_length');

function add_pagination_to_author_page_query_string($query_string)
{
    if (isset($query_string['author_name'])) $query_string['post_type'] = array('post','bok');
    return $query_string;

}
add_filter('request', 'add_pagination_to_author_page_query_string');

function custom_post_author_archive( &$query )
{
    if ( $query->is_author )
        $query->set( 'post_type', array('post','bok') );
    remove_action( 'pre_get_posts', 'custom_post_author_archive' ); // run once!
}
add_action( 'pre_get_posts', 'custom_post_author_archive' );

	function author_excerpt (){                      
 $word_limit = 30; // Limit the number of words
 $more_txt = '[Läs mer]'; // The read more text
 $txt_end = '...'; // Display text end 
 $authorName = get_the_author();
 $authorUrl = get_author_posts_url( get_the_author_meta('ID'));
 $authorDescriptionShort = wp_trim_words(strip_tags(get_the_author_meta('description')), $word_limit, $txt_end. ' <a href="'.$authorUrl.'">'.$more_txt.'</a>');
 return $authorDescriptionShort; 
 }

//disable WordPress sanitization to allow more than just $allowedtags from /wp-includes/kses.php
remove_filter('pre_user_description', 'wp_filter_kses');
//add sanitization for WordPress posts
add_filter( 'pre_user_description', 'wp_filter_post_kses');
?>