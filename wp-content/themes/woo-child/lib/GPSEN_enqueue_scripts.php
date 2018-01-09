<?php


/**
 * @author Keith Murphy - nomad - nomadmystics@gmail.com
 * @summary Class for enqueuing scripts and styles
*/

class GPSEN_enqueue_scripts {

	public function init () {

		add_action( 'wp_enqueue_scripts', [$this,'gpsen_enqueue_styles'] );
		add_action( 'wp_enqueue_scripts', [$this,'gpsen_enqueue_script'] );

	}

	public function gpsen_enqueue_styles () {

//		wp_enqueue_style('gpsen-main', get_stylesheet_directory_uri() . '/build/css/main.css', [], '', 'all' );
		wp_enqueue_style('gpsen-partners', get_stylesheet_directory_uri() . '/build/css/partners.css', [], '', 'all' );

	}

	public function gpsen_enqueue_script () {
		$permalink = get_permalink();

		if ('http://gpsen.org/partners/' === $permalink) {
			wp_enqueue_script('google-maps-script', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBviYWyqgHU-bKS3-ksZNz07jOtoH_2CLA', [], '1.0.0', true);
			wp_enqueue_script('gpsen-partners-map', get_stylesheet_directory_uri() . '/build/js/gpsen_partner_map.js', ['google-maps-script'], '1.0.0', true);
		}

	}

} // end class
