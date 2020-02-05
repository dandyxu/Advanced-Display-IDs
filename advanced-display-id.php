<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://dandyxu.me
 * @since             2.0.0
 * @package           Advanced_Display_Id
 *
 * @wordpress-plugin
 * Plugin Name:       Advanced Display IDs
 * Plugin URI:        https://github.com/dandyxu/Advanced-Display-IDs
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           2.0.0
 * Author:            Dandy Xu
 * Author URI:        https://dandyxu.me
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       advanced-display-id
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 2.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '2.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-advanced-display-id-activator.php
 */
function activate_advanced_display_id() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-advanced-display-id-activator.php';
	Advanced_Display_Id_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-advanced-display-id-deactivator.php
 */
function deactivate_advanced_display_id() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-advanced-display-id-deactivator.php';
	Advanced_Display_Id_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_advanced_display_id' );
register_deactivation_hook( __FILE__, 'deactivate_advanced_display_id' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-advanced-display-id.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    2.0.0
 */
function run_advanced_display_id() {

	$plugin = new Advanced_Display_Id();
	$plugin->run();

}
run_advanced_display_id();
