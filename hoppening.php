<?php
/*
Plugin Name: Hoppening
Plugin URI: http://hoppening.com
Description: Add a shortcode and a widget to embed Hoppening events
Version: 1.0
Author: Benjamin Niess
Author URI: http://benjamin-niess.fr
Text Domain: hoppening
Domain Path: /languages/

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

define( 'HOPP_VERSION', '1.0' );
define( 'HOPP_URL', plugin_dir_url ( __FILE__ ));
define( 'HOPP_DIR', plugin_dir_path( __FILE__ ));

require( HOPP_DIR . '/classes/client.php');
require( HOPP_DIR . '/classes/widget.php');

if ( is_admin() ) {
	require( HOPP_DIR . '/classes/admin.php');
}

function hoppening_init() {

	// Load up the localization file if we're using WordPress in a different language
	// Place it in this plugin's "lang" folder and name it "hoppening-[value in wp-config].mo"
	load_plugin_textdomain( 'hoppening', false, basename( rtrim( dirname( __FILE__ ), '/' ) ) . '/languages' );

	// Admin
	if ( class_exists( 'Hoppening_Admin' ) ) {
		new Hoppening_Admin();
	}

	new Hoppening_Client();
}
add_action( 'plugins_loaded', 'hoppening_init' );