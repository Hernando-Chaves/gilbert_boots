<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://hernandochaves.com
 * @since      1.0.0
 *
 * @package    Gilbert_boots
 * @subpackage Gilbert_boots/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Gilbert_boots
 * @subpackage Gilbert_boots/admin
 * @author     Hernando J Chaves <paginas1a@gmail.com>
 */
class Gilbert_boots_Admin 
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $menu;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $db;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) 
	{
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
		global $wpdb;
		$this->db = $wpdb;
		$this->menu        = new Gilbert_boots_Menu();

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles($hook) 
	{
		if($hook != "toplevel_page_gilboots")
		{
			return;
		}
		wp_enqueue_style( $this->plugin_name, GIL_DIR_URL . 'admin/css/gilbert_boots-admin.css', [], $this->version, 'all' );
		wp_enqueue_style( 'bootstrap_css', GIL_DIR_URL . 'libs/bootstrap/css/bootstrap.min.css', [], $this->version, 'all' );
		wp_enqueue_style( 'sweetalert_css', GIL_DIR_URL . 'libs/sweetalert2/dist/sweetalert2.min.css', [], $this->version, 'all' );
		wp_enqueue_style( 'fontawesome_css', GIL_DIR_URL . 'libs/fontawesome/css/all.min.css', [], '5.6.1', 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts($hook) 
	{
		if($hook != "toplevel_page_gilboots")
		{
			return;
		}
		wp_enqueue_script( 'sweetalert_js', GIL_DIR_URL . 'libs/sweetalert2/dist/sweetalert2.all.min.js', ['jquery'], $this->version, true );
		wp_enqueue_script( 'bootstrap_js', GIL_DIR_URL . 'libs/bootstrap/js/bootstrap.min.js', ['jquery'], $this->version, true );
		wp_enqueue_script( 'fontawesome_js', GIL_DIR_URL . 'libs/fontawesome/js/all.min.js', [], '5.6.1', true );
		wp_enqueue_script( $this->plugin_name, GIL_DIR_URL . 'admin/js/gilbert_boots-admin.js', ['jquery'], $this->version, true );

		wp_localize_script($this->plugin_name,'giltest',
			[
				'url'     => admin_url('admin-ajax.php'),
				'security'=> wp_create_nonce( 'gil_nonce' )
			]);

	}

	public function gil_boots_add_menu_page()
	{
		$this->menu->add_menu_page('gilboots','Gilbert Boots','manage_options','gilboots',[$this,'view_gilboots'],'dashicons-awards',20);
		$this->menu->run();
	}

	public function view_gilboots()
	{
		if($_GET['page'] == 'gilboots'  && $_GET['action'] == 'edit' && isset($_GET['id']))
		{
			require_once GIL_DIR_PATH . 'admin/partials/gilboots_edit_view.php';
		} else {
			require_once GIL_DIR_PATH . 'admin/partials/gilbert_boots-admin-display.php';
		}
	}

	public function gil_boots_crear_tabla()
	{
		check_ajax_referer( 'gil_nonce', 'nonce' );

		if(current_user_can( 'manage_options' ))
		{
			extract($_POST,EXTR_OVERWRITE);

			if($tipo == 'add')
			{
				$columns = [
					'nombre'=> $nombre,
					'data'=> '',
				];

				$result = $this->db->insert(GIL_TABLE,$columns);

				$json = json_encode([
					'result'   => $result,
					'nombre'   => $nombre,
					'insert_id'=> $this->db->insert_id,
				]);
			}
			echo $json;
			wp_die();
		}
	}

}
