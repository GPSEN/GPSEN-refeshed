<?php


/**
 * @author Keith Murphy - nomad - nomadmystics@gmail.com
 * @summary Class for enqueuing scripts and styles
*/

class gpsen_enqueue_scripts {

	public function init () {

		add_action( 'wp_enqueue_scripts', [$this,'gpsen_enqueue_styles'] );

	}

	public function gpsen_enqueue_styles () {

		wp_enqueue_style('gpsen-main', get_stylesheet_directory_uri() . '/build/css/main.css', [], '', 'all' );

	}

} // end class
