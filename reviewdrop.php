<?php

/**
 * The plugin bootstrap file
 *
 *
 * @link              https://reviewdrop.io
 * @since             1.0.0
 * @package           Reviewdrop
 *
 * @wordpress-plugin
 * Plugin Name:       Reviewdrop
 * Plugin URI:        https://reviewdrop.io
 * Description:       Add business reviews to your website with Reviewdrop.
 * Version:           1.8.0
 * Author:            Reviewdrop
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       reviewdrop
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 */
define( 'rdxt', '1.8.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-reviewdrop-activator.php
 */
function activate_reviewdrop() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-reviewdrop-activator.php';
	rdxt_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-reviewdrop-deactivator.php
 */
function deactivate_reviewdrop() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-reviewdrop-deactivator.php';
	rdxt_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_reviewdrop' );
register_deactivation_hook( __FILE__, 'deactivate_reviewdrop' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-reviewdrop.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_reviewdrop() {

	$plugin = new Reviewdrop();
	$plugin->run();

}
run_reviewdrop();

//
add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'rdxt_add_plugin_page_settings_link');
function rdxt_add_plugin_page_settings_link( $links ) {
	$links[] = '<a href="' .
		admin_url( 'options-general.php?page=reviewdrop' ) .
		'">' . __('Settings') . '</a>';
		$links[] = '<a href="https://docs.reviewdrop.io" target="_blank">' . __('Help') . '</a>';
	return $links;
}
