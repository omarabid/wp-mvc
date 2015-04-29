<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
// Exit if class is already defined
if ( class_exists( 'BP_MVC_Admin_Model' ) ) {
	return;
}

/**
 * Admin Model 
 *
 * @class BP_MVC_Admin_Model 
 * @package app/core
 * @author Abid Omar
 */
abstract class BP_MVC_Admin_Model {
	protected $data = array();

	public function __construct() {

	}

	public function get_data() {
		return $this->data;
	}
}
