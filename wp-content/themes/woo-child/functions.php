<?php

/*

Add any custom functions to your child theme here

*/

// Move footer widgetized area inside footer container

/*--add_action( 'init', 'woo_move_footer_widgets' );

function woo_move_footer_widgets() {

remove_action( 'woo_footer_top', 'woo_footer_sidebars', 30 );

add_action( 'woo_footer_inside', 'woo_footer_sidebars', 30 );

}--/
/*-- This will move footer widgets throughout the site by placing where you want to add_action to in the template*/

/*------Widgetizing area---*/
/* Register our sidebars and widgetized areas.
 */

//function gpsen_custom_scripts()
//{
//    wp_enqueue_scripts('gpsen-partners-google-maps', 'http://maps.google.com/maps/api/js?key=AIzaSyAx2cypTFsOW1AHcwnBJZh9AqyxycX0VKs&sensor=false');
//}
//add_action('wp_enqueue_scripts', 'gpsen_custom_scripts');
//


function footer_nav_widgets_init()
{
	register_sidebar(array(
		'name'          => 'Footer Quick Links Area',
		'id'            => 'footer_nav',
		'before_widget' => '<div id="footerNavigation">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="liteBlueButton">',
		'after_title'   => '</h2>',
	));
}
add_action( 'widgets_init', 'footer_nav_widgets_init' );

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

