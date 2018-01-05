<?php

/**
 * @author Keith Murphy - nomad - nomadmystics@gmail.com
 * @summary All custom types will be built here
 * @link https://codex.wordpress.org/Function_Reference/register_post_type
*/

class GPSEN_custom_post_types {


	/**
	 * @summary Add your hooks here
	 * @return void
	 */

	public function init () {

		add_action( 'init', [$this, 'gpsen_partner_custom_post_type'] );
		add_action( 'add_meta_boxes', [$this, 'gpsen_remove_partners_metaboxes'] );

	}


	/**
	 * @author Keith Murphy - nomad - nomadmystics@gmail.com
	 * @summary Build partners posts here so we can use them in the loop
	 * on the partners page over hardcoded HTML
	 * @link https://developer.wordpress.org/reference/functions/register_post_type/
	 * @return void
	*/

	public function gpsen_partner_custom_post_type () {

		$labels = [
			'name' => _x('Partners', 'Partners', 'gpsen'),
			'singular_name' => _x('Partner', 'Partner', 'gpsen'),
			'menu_name'          => _x( 'Partners', 'admin menu', 'gpsen' ),
			'name_admin_bar'     => _x( 'Partner', 'add new on admin bar', 'gpsen' ),
			'add_new'            => _x( 'Add New', 'book', 'gpsen' ),
			'add_new_item'       => __( 'Add New Partner', 'gpsen' ),
			'new_item'           => __( 'New Partner', 'gpsen' ),
			'edit_item'          => __( 'Edit Partner', 'gpsen' ),
			'view_item'          => __( 'View Partner', 'gpsen' ),
			'all_items'          => __( 'All Partners', 'gpsen' ),
			'search_items'       => __( 'Search Partners', 'gpsen' ),
			'parent_item_colon'  => __( 'Parent Partners:', 'gpsen' ),
			'not_found'          => __( 'No Partner found.', 'gpsen' ),
			'not_found_in_trash' => __( 'No Partner found in Trash.', 'gpsen' )
		];

		$args = [
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'hierarchical' => true,
			'rewrite' => ['slug' => 'gpsen_partners'],
			'taxonomies' => ['partners_categories'],
			'menu_position' => 6,
			'supports' => ['title', 'thumbnail', 'custom-fields', 'slug' ],
			'capability_type'     => 'post',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'has_archive' => true,
			'show_in_rest' => true,
		];

		register_post_type('gpsen_partners', $args );

	}

	/**
	 * @author Keith Murphy - nomad - nomadmystics@gmail.com
	 * @summary Remove metaboxes from the partner custom post
	 * @link https://codex.wordpress.org/Function_Reference/remove_meta_box
	 * @return void
	 */

	public function gpsen_remove_partners_metaboxes () {

		remove_meta_box( 'woothemes-settings', 'gpsen_partners', 'normal');
		remove_meta_box( 'mymetabox_revslider_0', 'gpsen_partners', 'normal');

	}

}
