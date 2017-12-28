<?php


/**
 * @author Keith Murphy - nomad - nomadmystics@gmail.com
 * @summary Class for enqueuing scripts and styles
*/

class gpsen_enqueue_scripts {

	public function init () {
		add_action( 'wp_enqueue_scripts', [$this,'gpsen_enqueue_styles'] );
		add_action( 'wp_enqueue_scripts', [$this,'gpsen_enqueue_script'] );
	}

	public function gpsen_enqueue_styles () {
		wp_enqueue_style('gpsen-bootstrap-css', get_stylesheet_directory_uri() . '/vendor/bootstrap.min.css', ['theme-stylesheet'], '', 'all' );
		wp_enqueue_style('gpsen-main', get_stylesheet_directory_uri() . '/build/css/main.css', ['theme-stylesheet', 'gpsen-bootstrap-css'], '', 'all' );
	}

	public function gpsen_enqueue_script () {

		wp_enqueue_script('gpsen-jquery-ui', get_stylesheet_directory_uri() . '/build/jqueryUI.bundle.js', ['jquery'], '1.0.0', true );
		wp_enqueue_script('gpsen-bootstrap-js', get_stylesheet_directory_uri() . '/build/bootstrap.bundle.js', ['jquery', 'gpsen-jquery-ui'], '1.0.0', true );
		wp_enqueue_script('gpsen-old-bundle', get_stylesheet_directory_uri() . '/build/old.bundle.js', ['jquery', 'gpsen-jquery-ui', 'gpsen-bootstrap'], '1.0.0', true );
		wp_enqueue_script('gpsen-main-bundle', get_stylesheet_directory_uri() . '/build/main.bundle.js', ['jquery', 'gpsen-jquery-ui', 'gpsen-bootstrap'], '1.0.0', true );

	}

} // end class
