<?php



class GPSEN_rest_api {

	public function init () {

		add_action( 'rest_api_init', [$this, 'gpsen_create_post_meta_fields'] );

	}

	/**
	 * @author Keith Murphy - nomad - nomadmystics@gmail.com
	 * @summary Add Metadata to REST for Partners custom posts
	 * @link https://developer.wordpress.org/reference/functions/register_rest_field/
	 * @return void
	*/

	public function gpsen_create_post_meta_fields () {

		register_rest_field( 'gpsen_partners', 'post-meta-fields', [
			'get_callback' => function ( $object ) {
				//get the id of the post object array
				$post_id = $object['id'];

				//return the post meta
				return get_post_meta( $post_id );
			},
			'schema' => null,
		]);

	}

}