<?php


require_once( __DIR__ . '/lib/GPSEN_widgets.php' );
require_once( __DIR__ . '/lib/GPSEN_enqueue_scripts.php' );
require_once( __DIR__ . '/lib/GPSEN_custom_taxonomies.php');
require_once( __DIR__ . '/lib/GPSEN_custom_post_types.php' );
require_once( __DIR__ . '/lib/GPSEN_rest_api.php');

/**
 * @summary Make sure the class exists and call its init()
 */

if ( class_exists( 'GPSEN_widgets' ) ) {

	$gpsen_widgets = new GPSEN_widgets();
	$gpsen_widgets->init();

}


/**
 * @summary Make sure the class exists and call its init()
 */

if ( class_exists( 'GPSEN_enqueue_scripts' ) ) {

	$gpsen_enqueue = new GPSEN_enqueue_scripts();
	$gpsen_enqueue->init();

}



if ( class_exists('GPSEN_custom_taxonomies') ) {

	$gpsen_custom_taxonomies = new GPSEN_custom_taxonomies();
	$gpsen_custom_taxonomies->init();

}

if ( class_exists('GPSEN_custom_post_types') ) {

	$gpsen_custom_post_types = new GPSEN_custom_post_types();
	$gpsen_custom_post_types->init();

}

if ( class_exists('GPSEN_rest_api') ) {

	$gpsen__rest_api = new GPSEN_rest_api();
	$gpsen__rest_api->init();

}


/*---adding Page supports to posts---*/
function add_page_support()
{
    $args = array(
        'title',
        'editor',
        'excerpt',
        'author',
        'thumbnail',
        'comments',
        'trackbacks',
        'revisions',
        'custom-fields',
        'page-attributes',
        'post-formats',
    );
    add_post_type_support('post', $args);
}
add_action( 'init', 'add_page_support' );

