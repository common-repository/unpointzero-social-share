<?php
/**
 *
 * @package   UPZ Social-Share
 * @author    UnPointZero
 * @license   GPL-2.0+
 * @link      http://www.unpointzero.com
 * @copyright 2014 UnPointZero
 *
 * @wordpress-plugin
 * Plugin Name:       UnPointZero Social-Share
 * Plugin URI:        http://www.unpointzero.com
 * Description:       Simple social-share icons, 100% customizable. No bullshit.
 * Version:           1.0.3
 * Author:            UnPointZero
 * Author URI:        http://www.unpointzero.com
 * Text Domain:       upz-social-share
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * WordPress-Plugin-Boilerplate: v2.6.1
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

require_once( plugin_dir_path( __FILE__ ) . 'public/class-upz-socialshare.php' );

register_activation_hook( __FILE__, array( 'UPZ_SocialShare', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'UPZ_SocialShare', 'deactivate' ) );

add_action( 'plugins_loaded', array( 'UPZ_SocialShare', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 *
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-upz-socialshare-admin.php' );
	add_action( 'plugins_loaded', array( 'UPZ_SocialShare_Admin', 'get_instance' ) );

}
