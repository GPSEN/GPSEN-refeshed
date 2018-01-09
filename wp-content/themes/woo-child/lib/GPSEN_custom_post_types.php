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
		// For Partners custom post
		add_action( 'init', [$this, 'gpsen_partner_custom_post_type'] );
		add_action( 'add_meta_boxes', [$this, 'gpsen_remove_partners_metaboxes'] );

		// For New Archives custom post
		add_action( 'init', [$this, 'gpsen_news_archives_custom_post_type'] );

		add_action( 'add_meta_boxes', [$this, 'gpsen_add_news_archives_metaboxes'] );
		add_action( 'add_meta_boxes', [$this, 'gpsen_delete_news_archives_metaboxes'] );

		add_action( 'save_post', [$this, 'gpsen_save_news_archives_data'], 10, 3 );
		add_action( 'save_post', [$this, 'gpsen_delete_news_archives_attachment_item'], 10, 3 );

		add_action('post_edit_form_tag', [$this, 'gpsen_update_edit_form'] );
		add_action( 'add_meta_boxes', [$this, 'gpsen_remove_news_archives_metaboxes'] );
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


	/**
	 * @author Keith Murphy - nomad - nomadmystics@gmail.com
	 * @summary Build New Archives
	 * @link https://developer.wordpress.org/reference/functions/register_post_type/
	 * @return void
	 */

	public function gpsen_news_archives_custom_post_type () {

		$labels = [
			'name' => _x('News Archives', 'News Archives', 'gpsen'),
			'singular_name' => _x('News Archive', 'News Archive', 'gpsen'),
			'menu_name'          => _x( 'News Archives', 'admin menu', 'gpsen' ),
			'name_admin_bar'     => _x( 'News Archive', 'add new on admin bar', 'gpsen' ),
			'add_new'            => _x( 'Add New', 'book', 'gpsen' ),
			'add_new_item'       => __( 'Add New News Archive', 'gpsen' ),
			'new_item'           => __( 'New News Archive', 'gpsen' ),
			'edit_item'          => __( 'Edit News Archive', 'gpsen' ),
			'view_item'          => __( 'View News Archive', 'gpsen' ),
			'all_items'          => __( 'All News Archives', 'gpsen' ),
			'search_items'       => __( 'Search News Archives', 'gpsen' ),
			'parent_item_colon'  => __( 'Parent News Archives:', 'gpsen' ),
			'not_found'          => __( 'No Partner found.', 'gpsen' ),
			'not_found_in_trash' => __( 'No Partner found in Trash.', 'gpsen' )
		];

		$args = [
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'hierarchical' => true,
			'rewrite' => ['slug' => 'gpsen_news_archives'],
			'taxonomies' => ['gpsen_news_archives_categories'],
			'menu_position' => 7,
			'supports' => ['title', ],
			'capability_type'     => 'post',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'has_archive' => true,
			'show_in_rest' => true,
		];

		register_post_type('gpsen_news_archives', $args );

	}

	public function gpsen_add_news_archives_metaboxes () {

		// Define the custom attachment for posts
		add_meta_box(
			'gpsen_news_archives_attachment',
			'Add a News Archive Attachment',
			[$this, 'gpsen_news_archives_attachment_metabox_html'],
			'gpsen_news_archives',
			'normal'
		);

	}

	public function gpsen_delete_news_archives_metaboxes () {

		// Define the custom attachment for posts
		add_meta_box(
			'gpsen_delete_news_archives_attachment',
			'Delete the News Archive Attachment',
			[$this, 'gpsen_delete_news_archives_attachment_metabox_html'],
			'gpsen_news_archives',
			'normal'
		);

	}


	/**
	 * @author Keith Murphy - nomad - nomadmystics@gmail.com
	 * @summary Build the metabox for uploading files
	 * @link https://codex.wordpress.org/Function_Reference/wp_nonce_field
	 * @return void
	*/

	public function gpsen_news_archives_attachment_metabox_html () {
		wp_nonce_field( plugin_basename( __FILE__ ), 'gpsen_news_archives_attachment_nonce' );

		// For the file up load
		$html = '';

		$html .= '<label for="gpsen_news_archives_attachment" class="description">Upload your file here:<br>';
		$html .= '<input type="file" id="gpsen_news_archives_attachment" name="gpsen_news_archives_attachment" value="">';
		$html .= '</label><br>';

		echo $html;

	}


	/**
	 * @author Keith Murphy - nomad - nomadmystics@gmail.com
	 * @summary Build the metabox for deleting uploaded file
	 * @link https://codex.wordpress.org/Function_Reference/wp_nonce_field
	 * @return void
	 */

	public function gpsen_delete_news_archives_attachment_metabox_html () {
		wp_nonce_field( plugin_basename( __FILE__ ), 'gpsen_news_archives_attachment_nonce' );

		$html = '';
		$filename = '';
		$metadata = get_post_meta(get_the_ID());

		if ( isset($metadata['gpsen_news_archives_attachment']) ) {

			$unserialize_meta = unserialize($metadata['gpsen_news_archives_attachment'][0]);
			$filename = esc_html(basename($unserialize_meta['file']));

			$html .= '<p>Check this box to and update to delete the uploaded file:</p>';
			$html .= "<input type=\"checkbox\" value=\"1\" id=\"gpsen_news_archives_attachment_checkbox\" name=\"gpsen_news_archives_attachment_checkbox\" />";
			$html .= "<label for=\"gpsen_news_archives_attachment_checkbox\">{$filename}</label>";

			echo $html;

		} else {

			$html .= '<p>No File Uploaded</p>';

			echo $html;

		}

	}


	/**
	 * @author Keith Murphy - nomad - nomadmystics@gmail.com
	 * @summary If the Delete checkbox is checked delete the file
	 * @link https://codex.wordpress.org/Function_Reference/delete_post_meta
	 * @param int $id
	 * @param object $post
	 * @param object $update
	 * @return void
	*/

	public function gpsen_delete_news_archives_attachment_item ( $id, $post, $update ) {

		$id = $post->ID;
		$chk = ( isset( $_POST['gpsen_news_archives_attachment_checkbox'] ) && $_POST['gpsen_news_archives_attachment_checkbox'] ) ? 'on' : 'off';

		if ( $chk === 'on' ) {
			delete_post_meta( $id, 'gpsen_news_archives_attachment');

		} else {
			echo 'Something else is checked.';
		}

	}


	/**
	 * @author Keith Murphy - nomad - nomadmystics@gmail.com
	 * @summary Build the metabox for uploading files
	 * @link https://code.tutsplus.com/articles/attaching-files-to-your-posts-using-wordpress-custom-meta-boxes-part-1--wp-22291
	 * @link http://codex.wordpress.org/Function_Reference/wp_upload_bits
	 * @link http://codex.wordpress.org/Function_Reference/wp_handle_upload
	 * @param int $id
	 * @return int $id
	 */

	public function gpsen_save_news_archives_data ($id, $post, $update) {

		$id = $post->ID;

		/* --- security verification --- */

		if ( !wp_verify_nonce($_POST['gpsen_news_archives_attachment_nonce'], plugin_basename(__FILE__)) ) {

			return $id;

		} // end if

		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {

			return $id;

		} // end if

		if ( 'page' == $_POST['post_type'] ) {

			if (!current_user_can('edit_page', $id)) {
				return $id;
			} // end if

		} else {

			if ( !current_user_can('edit_page', $id) ) {
				return $id;
			} // end if

		} // end if

		/* - end security verification - */

		// Make sure the file array isn't empty
		if ( !empty($_FILES['gpsen_news_archives_attachment']['name']) ) {

			// Setup the array of supported file types. In this case, it's just PDF.
			$supported_types = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',];

			// Get the file type of the upload
			$arr_file_type = wp_check_filetype( basename($_FILES['gpsen_news_archives_attachment']['name']) );
			$uploaded_type = $arr_file_type['type'];

			// Check if the type is supported. If not, throw an error.
			if ( in_array($uploaded_type, $supported_types) ) {
				// Use the WordPress API to upload the file
				$upload = wp_upload_bits( $_FILES['gpsen_news_archives_attachment']['name'], null, file_get_contents($_FILES['gpsen_news_archives_attachment']['tmp_name']) );

				if (isset($upload['error']) && $upload['error'] != 0) {

					wp_die( 'There was an error uploading your file. The error is: ' . $upload['error'] );

				} else {
					delete_post_meta( $id, 'gpsen_news_archives_attachment');
					add_post_meta( $id, 'gpsen_news_archives_attachment', $upload );
					update_post_meta( $id, 'gpsen_news_archives_attachment', $upload );

				} // end if/else

			} else {

				wp_die( "The file type that you've uploaded is not a PDF/DOC/DOCX." );

			} // end if/else

		} // end if

	}

	public function gpsen_update_edit_form () {
		echo 'enctype="multipart/form-data"';
	}


	/**
	 * @author Keith Murphy - nomad - nomadmystics@gmail.com
	 * @summary Remove metaboxes from the news archives custom post
	 * @link https://codex.wordpress.org/Function_Reference/remove_meta_box
	 * @return void
	 */

	public function gpsen_remove_news_archives_metaboxes () {

		remove_meta_box( 'woothemes-settings', 'gpsen_news_archives', 'normal');

	}

}
