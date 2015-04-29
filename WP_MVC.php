<?php
/**
 * MVC Core Loader 
 *
 * @class WP_MVC 
 * @package app/core
 * @author Abid Omar
 */
class WP_MVC {

	private $app_path;
	private $admin_pages = array();
	private $front_pages = array();

	public function __construct( $app_path ) {
		$this->app_path = $app_path;
		$this->router = require_once( $app_path . '/router.php' );

		// Admin Pages
		$this->load_admin_pages();
		// Front Pages	
		$this->load_front_pages();
		// Widgets
		$this->load_widgets();
	}

	private function load_admin_pages() {
		foreach( $this->router['admin'] as $file=>$class ) {	
			require_once( $this->app_path . '/controllers/admin/' . $file . '.php' );
			new $class();	
		}	
	}

	private function load_front_pages() {

	}

	private function load_widgets() {
		foreach( $this->router['widgets'] as $dir=>$class ) {
			require_once( $this->app_path . '/widgets/' . $dir . '/class-widget.php' );

			add_action( 'widgets_init', create_function( '', 'register_widget("' . $class . '");' ) );
		}
	}
}
