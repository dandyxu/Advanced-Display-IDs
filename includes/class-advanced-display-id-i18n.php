<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://dandyxu.me
 * @since      1.0.0
 *
 * @package    Advanced_Display_Id
 * @subpackage Advanced_Display_Id/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Advanced_Display_Id
 * @subpackage Advanced_Display_Id/includes
 * @author     Dandy Xu <dandyjefferson@gmail.com>
 */
class Advanced_Display_Id_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'advanced-display-id',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
