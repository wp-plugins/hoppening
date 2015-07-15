<?php
class Hoppening_Admin {
	function __construct() {
		add_action( 'admin_init', array( __CLASS__, 'enqueue' ) );

		// Add the tinyMCE button
		add_action( 'admin_init', array( __CLASS__, 'add_mce_button' ) );
		add_action( 'wp_ajax_' . 'hoppening_shortcode_printer', array( __CLASS__, 'wp_ajax_fct' ) );

	}

	/**
	 * Load all scripts and styles
	 *
	 * @author Benjamin Niess
	 */
	public static function enqueue() {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
	}

	/**
	 * The content of the javascript popin for the PDF insertion
	 *
	 * @author Benjamin Niess
	 */
	public static function wp_ajax_fct(){
		$tpl = Hoppening_Client::get_template( 'admin/popin' );
		if ( empty( $tpl ) ) {
			return false;
		}

		include ( $tpl );
		exit;
	}

	/**
	 * Add buttons to the tiymce bar
	 *
	 * @author Benjamin Niess
	 */
	public static function add_mce_button() {
		// Don't bother doing this stuff if the current user lacks permissions
		if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
			return false;
		}
		
		if ( get_user_option('rich_editing') == 'true') {
			add_filter('mce_external_plugins', array (__CLASS__,'add_tinymce_script' ) );
			add_filter('mce_buttons', array (__CLASS__,'register_mce_button' ) );
		}
	}

	/**
	 * Add buttons to the tiymce bar
	 *
	 * @author Benjamin Niess
	 */
	public static function register_mce_button( $buttons ) {
		array_push($buttons, "|", "hoppening");
		return $buttons;
	}

	/**
	 * Load the custom js for the tinymce button
	 *
	 * @author Benjamin Niess
	 */
	public static function add_tinymce_script( $plugin_array ) {
		$plugin_array['hoppening'] = HOPP_URL . '/assets/js/tinymce.js';
		return $plugin_array;
	}
}
