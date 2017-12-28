<?php



/**
 * @author Keith Murphy - nomad - nomadmystics@gmail.com
 * @summary Class to create custom widgets
*/

class gpsen_widgets {

	public function init () {
		add_action( 'widgets_init', [$this, 'footer_nav_widgets_init'] );

	}


	/**
	 * @author Keith Murphy - nomad - nomadmystics@gmail.com
	 * @summary Build the footer navigation custom widget
	*/

	public function footer_nav_widgets_init () {
		register_sidebar([
			'name'          => 'Footer Quick Links Area',
			'id'            => 'footer_nav',
			'before_widget' => '<div id="footerNavigation">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="liteBlueButton">',
			'after_title'   => '</h2>',
		]);
	}

} // end class
