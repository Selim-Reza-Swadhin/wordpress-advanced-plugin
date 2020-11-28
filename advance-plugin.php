<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              selimrezaswadhin
 * @since             1.0.0
 * @package           Advance_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       advanced Plugin
 * Plugin URI:        selimrezaswadhin.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Selim Reza Swadhin
 * Author URI:        selimrezaswadhin
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       advance-plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ADVANCE_PLUGIN_VERSION', '1.0.0' );
define( 'ADVANCED_PLUGIN_BOOK_URL', plugin_dir_url( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-advance-plugin-activator.php
 */
function activate_advance_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-advance-plugin-activator.php';
	//Advance_Plugin_Activator::activate(); //static
	$activator = new Advance_Plugin_Activator;
	//$activator = new Advance_Plugin_Activator();
    $activator->activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-advance-plugin-deactivator.php
 */
function deactivate_advance_plugin() {
    //IMPORT OR INCLUDE START
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-advance-plugin-activator.php';
    $activator = new Advance_Plugin_Activator;
    //IMPORT OR INCLUDE END

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-advance-plugin-deactivator.php';
	//Advance_Plugin_Deactivator::deactivate();//static
	//$deactivator = new Advance_Plugin_Deactivator;
	$deactivator = new Advance_Plugin_Deactivator($activator);
	$deactivator->deactivate();
}

register_activation_hook( __FILE__, 'activate_advance_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_advance_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-advance-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_advance_plugin() {

	$plugin = new Advance_Plugin();
	$plugin->run();

}
run_advance_plugin();
