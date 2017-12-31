<?php
/**
 * Created by PhpStorm.
 * User: nomad
 * Date: 12/30/17
 * Time: 5:25 PM
 */

class GPSEN_custom_post_types {

	public function init () {
		add_action( 'init', [$this, 'gpsen_partner_custom_post_type'] );

	}

	public function gpsen_partner_custom_post_type () {

	}
}
