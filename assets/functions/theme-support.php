<?php

// Adding WP Functions & Theme Support
function joints_theme_support() {

	// Add WP Thumbnail Support
	add_theme_support( 'post-thumbnails' );

	// Default thumbnail size
	set_post_thumbnail_size(125, 125, true);

	// Add RSS Support
	add_theme_support( 'automatic-feed-links' );

	// Add Support for WP Controlled Title Tag
	add_theme_support( 'title-tag' );

	// Add HTML5 Support
	add_theme_support( 'html5',
	         array(
	         	'comment-list',
	         	'comment-form',
	         	'search-form',
	         )
	);

	// Adding post format support
	 add_theme_support( 'post-formats',
		array(
			'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
		)
	);

	// Set the maximum allowed width for any content in the theme, like oEmbeds and images added to posts.
	$GLOBALS['content_width'] = apply_filters( 'joints_theme_support', 1200 );

} /* end theme support */

add_action( 'after_setup_theme', 'joints_theme_support' );

add_filter( 'gettext', 'excerpt_gettext', 10, 2 );
function excerpt_gettext( $translation, $original )
{
    if ( 'Excerpt' == $original ) {
        return 'Banner slogan';
    }else{
        $pos = strpos($original, 'Excerpts are optional hand-crafted summaries of your');
        if ($pos !== false) {
            return  '';
        }
    }
    return $translation;
}

function standardversion() {
	$theID = get_the_ID();
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$site_url = site_url() . '/';
	if ( !in_array($theID, array(404, 630, 631), true ) && ($actual_link != $site_url )) {
		wp_redirect(site_url());
	}
}