<?php

/**
 * Fired during plugin activation
 *
 * @link       http://hernandochaves.com
 * @since      1.0.0
 *
 * @package    Gilbert_boots
 * @subpackage Gilbert_boots/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Gilbert_boots
 * @subpackage Gilbert_boots/includes
 * @author     Hernando J Chaves <paginas1a@gmail.com>
 */
class Gilbert_boots_Activator 
{

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() 
	{
		global $wpdb;

		$sql = "CREATE TABLE IF NOT EXISTS ". GIL_TABLE . "(
			id int(12) NOT NULL AUTO_INCREMENT,
			nombre varchar(50) NOT NULL,
			data longtext NOT NULL,
			PRIMARY KEY(id)
		)";

		$wpdb->query( $sql );
	}

}
