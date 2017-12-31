<?php

/**
 * @author Keith Murphy - nomad - nomadmystics@gmail.com
 * @summary
*/

class GPSEN_custom_taxonomies {


	/**
	 * @summary Add your hooks here
	 * @return void
	 */

	public function init () {

		add_action( 'init', [$this, 'gpsen_partners_taxonomies'] );

	}


	/**
	 * @author Keith Murphy - nomad - nomadmystics@gmail.com
	 * @summary Create Partners custom post type taxonomies here
	 * @link https://codex.wordpress.org/Function_Reference/register_taxonomy
	 * @link https://codex.wordpress.org/Function_Reference/register_taxonomy_for_object_type
	 * @return void
	 */

	public function gpsen_partners_taxonomies () {

		$taxonomy = 'partners_categories';
		$object_type = 'gpsen_partners';
		$args = [
			'hierarchical'      => true,
			'label'            => __('Partners Categories', 'gpsen'),
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'show_in_rest' => true,
			'public' => true,
		];

		register_taxonomy( $taxonomy, $object_type, $args);
		register_taxonomy_for_object_type( $taxonomy, $object_type );

	}

}

