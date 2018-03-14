<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://dandyxu.me
 * @since      1.0.0
 *
 * @package    Advanced_Display_Id
 * @subpackage Advanced_Display_Id/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Advanced_Display_Id
 * @subpackage Advanced_Display_Id/admin
 * @author     Dandy Xu <dandyjefferson@gmail.com>
 */
class Advanced_Display_Id_Admin {

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
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->options = get_option($this->plugin_name);

}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Advanced_Display_Id_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Advanced_Display_Id_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/advanced-display-id-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Advanced_Display_Id_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Advanced_Display_Id_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/advanced-display-id-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0.0
	 */
	public function add_plugin_admin_menu() {
		/**
		 * Add a settings page for this plugin to the Settings menu.
		 *
		 * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
		 *
		 *        Administration Menus: http://codex.wordpress.org/Administration_Menus
		 *
		 * add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function);
		 *
		 * @link https://codex.wordpress.org/Function_Reference/add_options_page
		 */
		add_submenu_page( 'tools.php', 'Advanced Display IDs Option Page', 'Display IDs Options', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page')
		);

	}

	/**
	 * Add settings action link to the plugins page.
	 *
	 * @since    1.0.0
	 */
	public function add_action_links( $links ) {
		/*
		*  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
		*/
	$settings_link = array(
		'<a href="' . admin_url( 'tools.php?page=' . $this->plugin_name ) . '">' . __( 'Settings', $this->plugin_name ) . '</a>',
	);
	return array_merge(  $settings_link, $links );
	}
	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_setup_page() {
		include_once( 'partials/' . $this->plugin_name . '-admin-display.php' );
	}
	/**
	 * Validate fields from admin area plugin settings form ('exopite-lazy-load-xt-admin-display.php')
	 * @param  mixed $input as field form settings form
	 * @return mixed as validated fields
	 */
	public function validate($input) {
		$valid = array();
		// Elvis operator ?:
		$valid['general_radio'] = ( isset($input['general_radio'] ) && ! empty( $input['general_radio'] )) ?: $input['general_radio'];
		$valid['post_radio'] = ( isset($input['post_radio'] ) && ! empty( $input['post_radio'] )) ?: $input['post_radio'];
		$valid['page_radio'] = ( isset($input['page_radio'] ) && ! empty( $input['page_radio'] )) ?: $input['page_radio'] ;
		$valid['media_radio'] = ( isset($input['media_radio'] ) && ! empty( $input['media_radio'] )) ?: $input['media_radio'];
		$valid['link_radio'] = ( isset($input['link_radio'] ) && ! empty( $input['link_radio'] )) ?: $input['link_radio'];
		$valid['category_radio'] = ( isset($input['category_radio'] ) && ! empty( $input['category_radio'] )) ?: $input['category_radio'];
		$valid['user_radio'] = ( isset($input['user_radio'] ) && ! empty( $input['user_radio'] )) ?: $input['user_radio'];
		$valid['comment_radio'] = ( isset($input['comment_radio'] ) && ! empty( $input['comment_radio'] ) ) ?: $input['comment_radio'];
		$valid['cpt_radio'] = ( isset($input['cpt_radio'] ) && ! empty( $input['cpt_radio'] ) ) ?: $input['cpt_radio'];
		return $valid;
	}
	public function options_update() {
		register_setting( $this->plugin_name, $this->plugin_name, array( $this, 'validate' ) );
		
	}

	/**
	 * Init General Control of ID Management
	 */

	public function general_control() {
		if ($this->options['general_radio'] == 1) {
			// For Post Management
			add_filter( 'manage_posts_columns', array( $this, 'add_column' ) );
			add_action( 'manage_posts_custom_column', array( $this, 'add_value' ), 12, 2 );
			// For Page Management
			add_filter( 'manage_pages_columns', array( $this, 'add_column' ) );
			add_action( 'manage_pages_custom_column', array( $this, 'add_value' ), 12, 2 );
			// For Media Management
			add_filter( 'manage_media_columns', array( $this, 'add_column' ) );
			add_action( 'manage_media_custom_column', array( $this, 'add_value' ), 12, 2 );
			// For Link Management
			add_filter( 'manage_link-manager_columns', array( $this, 'add_column' ) );
			add_action( 'manage_link_custom_column', array( $this, 'add_value' ), 12, 2 );
			// For Category Management
			add_action( 'manage_edit-link-categories_columns', array( $this, 'add_column' ) );
			add_filter( 'manage_link_categories_custom_column', array( $this, 'add_return_value' ), 12, 3 );
			// For User Management
			add_action( 'manage_users_columns', array( $this, 'add_column' ) );
			add_filter( 'manage_users_custom_column', array( $this, 'add_return_value' ), 12, 3 );
			// For Comment Management
			add_action( 'manage_edit-comments_columns', array( $this, 'add_column' ) );
			add_action( 'manage_comments_custom_column', array( $this, 'add_value' ), 12, 2 );
			// For CPT Management
			add_action( 'admin_init', array( $this, 'custom_objects' ) );
			
		}
		
		if ( $this->options['general_radio'] == 0) {
			// For Post Management
			remove_filter( 'manage_posts_columns', array( $this, 'add_column' ) );
			remove_action( 'manage_posts_custom_column', array( $this, 'add_value' ), 12, 2 );
			// For Page Management
			remove_filter( 'manage_pages_columns', array( $this, 'add_column' ) );
			remove_action( 'manage_pages_custom_column', array( $this, 'add_value' ), 12, 2 );
			// For Media Management
			remove_filter( 'manage_media_columns', array( $this, 'add_column' ) );
			remove_action( 'manage_media_custom_column', array( $this, 'add_value' ), 10, 2 );
			// For Link Management
			remove_filter( 'manage_link-manager_columns', array( $this, 'add_column' ) );
			remove_action( 'manage_link_custom_column', array( $this, 'add_value' ), 12, 2 );
			// For Category Management
			remove_action( 'manage_edit-link-categories_columns', array( $this, 'add_column' ) );
			remove_filter( 'manage_link_categories_custom_column', array( $this, 'add_return_value' ), 12, 3 );
			// For User Management
			remove_action( 'manage_users_columns', array( $this, 'add_column' ) );
			remove_filter( 'manage_users_custom_column', array( $this, 'add_return_value' ), 12, 3 );
			// For Comment Management
			remove_action( 'manage_edit-comments_columns', array( $this, 'add_column' ) );
			remove_action( 'manage_comments_custom_column', array( $this, 'add_value' ), 12, 2 );
			// For CPT Management
			remove_action( 'admin_init', array( $this, 'custom_objects' ) );
		}
	}


	/**
	 * Hooks to the 'admin_init' for CPT and Taxnomoies
	 *
	 * @return void
	 */
	public function custom_objects() {
		// For CPT
		$post_types = get_post_types( array( 'public' => true ), 'names' );
		foreach ( $post_types as $post_type ) {
			if ( isset( $post_type ) ) {
				add_action( 'manage_edit-' . $post_type . '_columns', array( $this, 'add_column' ) );
				add_filter( 'manage_' . $post_type . '_custom_column', array( $this, 'add_return_value' ), 10, 3 );
			}
		}

		// For Custom Taxonomies
		$taxonomies = get_taxonomies( array( 'public' => true ), 'names' );
		foreach ( $taxonomies as $custom_taxonomy ) {
			if ( isset( $custom_taxonomy ) ) {
				add_action( 'manage_edit-' . $custom_taxonomy . '_columns', array( $this, 'add_column' ) );
				add_filter( 'manage_' . $custom_taxonomy . '_custom_column', array( $this, 'add_return_value' ), 10, 3 );
			}
		}
		
	}

	/**
	 * Adds column to edit screen
	 *
	 * @param mixed $cols
	 * @return void
	 */
	public function add_column( $cols ) {
		$cols['advanced-display-id'] = 'ID';
		return $cols;
	}
	
	/**
	 * Adds id value
	 *
	 * @param mixed $column_name
	 * @param mixed $id
	 * @return void
	 */
	public function add_value( $column_name, $id ) {
		if ( 'advanced-display-id' === $column_name ) {
			echo $id;
		}
	}
	/**
	 * Adds id value
	 *
	 * @param mixed $value
	 * @param mixed $column_name
	 * @param mixed $id
	 * @return void
	 */
	public function add_return_value( $value, $column_name, $id ) {
		if ( 'advanced-display-id' === $column_name ) {
			$value = $id;
		}
		return $value;
	}
}
