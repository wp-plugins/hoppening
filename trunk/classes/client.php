<?php
class Hoppening_Client {
	function __construct() {
		add_shortcode( 'hoppening', array( __CLASS__, 'shortcode' ) );
	}

	/**
	 * The hoppenning PDF shortcode
	 *
	 */
	public static function shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'user_id'    => null,
			'width'           => '',
			'height'          => '',
			'bgcolor' => '#FFFFFF',
			'font_color' => '#000000'
		), $atts ) );

		// Check if the required param is set
		if ( empty( $user_id ) ) {
			return false;
		}

		// Dimensions
		$width = ( (int) $width > 0 ) ? $width : false;
		$height = ( (int) $height > 0 ) ? $height : false;

		$bg_color = str_replace( '#', '', $bgcolor );
		$font_color = str_replace( '#', '', $font_color );

		$tpl = Hoppening_Client::get_template( 'shortcode' );
		if ( empty( $tpl ) ) {
			return false;
		}

		// Start to get the content to return it at the end
		ob_start();

		include ( $tpl );

		// Return the shortcode conten
		$content = ob_get_contents();
		ob_end_clean();

		return $content;
	}
	/**
	 * Get template file depending on theme
	 *
	 * @param (string) $tpl : the template name
	 * @return (string) the file path | false
	 *
	 * @author Benjamin Niess
	 */
	public static function get_template( $tpl = '' ) {
		if ( empty( $tpl ) ) {
			return false;
		}

		if ( is_file( STYLESHEETPATH . '/views/hoppening/' . $tpl . '.tpl.php' ) ) {// Use custom template from child theme
			return ( STYLESHEETPATH . '/views/hoppening/' . $tpl . '.tpl.php' );
		} elseif ( is_file( TEMPLATEPATH . '/hoppening/' . $tpl . '.tpl.php' ) ) {// Use custom template from parent theme
			return (TEMPLATEPATH . '/views/hoppening/' . $tpl . '.tpl.php' );
		} elseif ( is_file( HOPP_DIR . 'views/' . $tpl . '.tpl.php' ) ) {// Use builtin template
			return ( HOPP_DIR . 'views/' . $tpl . '.tpl.php' );
		}

		return false;
	}
}