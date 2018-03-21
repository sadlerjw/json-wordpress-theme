<?php

function json_setup() {
	add_theme_support( 'post-formats', array( 'link' ));
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
}

function json_undo_filters() {
	remove_filter( 'the_content', array( 'Kind_View', 'content_response' ), 20 );
	remove_filter( 'the_excerpt', array( 'Kind_View', 'excerpt_response' ), 20 );
}

add_action( 'after_setup_theme', 'json_setup' );
// add_action( 'init', 'json_undo_filters' );


function add_async_forscript($url)
{
    if (strpos($url, '#asyncload')===false)
        return $url;
    else if (is_admin())
        return str_replace('#asyncload', '', $url);
    else
        return str_replace('#asyncload', '', $url)."' async='async";
}
add_filter('clean_url', 'add_async_forscript', 11, 1);

function json_scripts() {
	// Load our main stylesheet.
	wp_enqueue_style( 'json-style', get_stylesheet_uri() );
	wp_enqueue_style( 'json-fonts', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,600,300italic,600italic|Source+Code+Pro|Exo+2:200,600' );

	wp_enqueue_script( 'json-main', get_template_directory_uri() . '/scripts/main.js', array(), '20180319', true );
	wp_enqueue_script( 'json-highlightjs', get_template_directory_uri() . '/scripts/highlight.pack.js', array(), `20180318`, true );
	wp_add_inline_script( 'json-highlightjs', 'hljs.initHighlightingOnLoad();' );

	wp_enqueue_script( 'json-twitter', 'https://platform.twitter.com/widgets.js#asyncload', array(), null, true);

    if (get_bloginfo('url') === 'http://vccw.test') {
        wp_enqueue_script( 'json-livereload', 'http://localhost:35729/livereload.js' );
    }

}
add_action( 'wp_enqueue_scripts', 'json_scripts' );

function no_title_micropost($post_id) {
    // If this is a revision, get real post ID
    if ( $parent_id = wp_is_post_revision( $post_id ) )
        $post_id = $parent_id;

    $post = get_post( $post_id );

    // Get default category ID from options
    $microCategory = get_category_by_slug( 'micro' );
    $title = $post->post_title;

    // Check if this post is in default category
    if ( strlen($title) == 0 && $microCategory !== false ) {
        // unhook this function so it doesn't loop infinitely
        // remove_action( 'save_post', 'no_title_micropost' );

        // update the post, which calls save_post again
        wp_set_post_categories( $post_id, array($microCategory->term_id), true);

        // re-hook this function
        // add_action( 'save_post', 'no_title_micropost' );
    }
}
add_action( 'save_post', 'no_title_micropost' );

