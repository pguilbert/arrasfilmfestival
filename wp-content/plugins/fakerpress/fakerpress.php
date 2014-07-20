<?php
/**
 * Plugin Name:       FakerPress
 * Plugin URI:        https://github.com/iryz/fakerpress
 * Description:       FakerPress is a clean way to generate fake data to your WordPress instalation, great for developers who need testing
 * Version:           0.1.3
 * Author:            Iryz
 * Author URI:        http://iryz.org
 * Text Domain:       fakerpress
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /l10n
 * GitHub Plugin URI: https://github.com/iryz/fakerpress
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ){
	die;
}

// Need to store this variable before leaving this file
define( '__FP_FILE__', __FILE__ );

/**
 * To allow internacionalization for the errors strings the text domain is
 * loaded in a 5.2 way, no Fatal Errors, only a message to the user.
 * @return null;
 */

function _fp_l10n() {
	load_plugin_textdomain( 'fakerpress', false, 'fakerpress' . DIRECTORY_SEPARATOR . 'l10n' );
}
add_action( 'plugins_loaded', '_fp_l10n' );

/**
 * Version compare to PHP 5.3, so we can use Namespaces, anonymous functions
 * and a lot of packages require 5.3, so...
 *
 * For now 3.8 or bigger is needed for the admin interface, later on the
 * intention is to bring this number lower
 */

if ( version_compare( PHP_VERSION, '5.3', '<' ) ) {
	if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

		if ( ! is_plugin_active( plugin_basename( __FP_FILE__ ) ) ){
			wp_print_styles( 'open-sans' );
			echo "<style>body{margin: 0 2px;font-family: 'Open Sans',sans-serif;font-size: 13px;line-height: 1.5em;}</style>";
			echo wp_kses_post( __( '<b>FakerPress</b> requires PHP 5.3 or higher, and the plugin has now disabled itself.', 'fakerpress' ) ) .
				'<br />' .
				esc_attr__( 'To allow better control over dates, advanced security improvements and performance gain.', 'fakerpress' ) .
				'<br />' .
				esc_attr__( 'Contact your Hosting or your system administrator and ask for this Upgrade to version 5.3 of PHP.', 'vsh' );
			exit();
		}

		deactivate_plugins( __FP_FILE__ );
	}
} else {
	require_once plugin_dir_path( __FP_FILE__ ) . 'inc' . DIRECTORY_SEPARATOR . 'load.php';
}