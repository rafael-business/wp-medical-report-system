<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://rafael.business
 * @since      1.0.0
 *
 * @package    Wp_Medical_Report_System
 * @subpackage Wp_Medical_Report_System/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp_Medical_Report_System
 * @subpackage Wp_Medical_Report_System/includes
 * @author     Rafael Business <contato@rafael.business>
 */
class Wp_Medical_Report_System_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-medical-report-system',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
