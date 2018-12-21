<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://hernandochaves.com
 * @since      1.0.0
 *
 * @package    Gilbert_boots
 * @subpackage Gilbert_boots/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Gilbert_boots
 * @subpackage Gilbert_boots/includes
 * @author     Hernando J Chaves <paginas1a@gmail.com>
 */
class Gilbert_boots_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'gilbert_boots',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
