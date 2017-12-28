<?php

require_once(__DIR__ . '/lib/gpsen_enqueue_scripts.php');
require_once(__DIR__ . '/lib/gpsen_widgets.php');


/**
 * @summary Make sure the class exists and call its init()
 */

if ( class_exists('gpsen_widgets') ) {

	$gpsen_widgets = new gpsen_widgets();
	$gpsen_widgets->init();

}


/**
 * @summary Make sure the class exists and call its init()
 */

if ( class_exists('gpsen_enqueue_scripts') ) {

	$gpsen_enqueue = new gpsen_enqueue_scripts();
	$gpsen_enqueue->init();

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

