<?php
class Hoppening_Widget extends WP_Widget {

	public function __construct() {

		parent::__construct(
			'hoppening', // Base ID
			__('Hoppening', 'hoppening'), // Name
			array( 'description' => __( 'Add a calendar of Hoppening events for a specific user ID', 'hoppening' ), ) // Args
		);

		add_action( 'load-widgets.php', array( &$this, 'enqueue' ) );

	}

	function enqueue() {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'hopp-widget', HOPP_URL . 'assets/js/widget.js', array( 'jquery' ), HOPP_VERSION, true );
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$title = empty( $instance['title'] ) ? '' : esc_attr( $instance['title'] );
		$user_id = empty( $instance['user_id'] ) ? '' : esc_attr( $instance['user_id'] );
		$width = (int) $instance['width'] > 0 ?  (int) $instance['width'] : 'auto';
		$height = (int) $instance['height'] > 0 ?  (int) $instance['height'] : 'auto';
		$bg_color = empty( $instance['bg_color'] ) ? '#FFFFFF' : esc_attr( $instance['bg_color'] );
		$font_color = empty( $instance['font_color'] ) ? '#000000' : esc_attr( $instance['font_color'] );

		echo $before_widget;

		if ( !empty( $title ) ) {
			echo $before_title . esc_attr( $title ) . $after_title;
		}

		echo do_shortcode( '[hoppening user_id="' . $user_id . '" width="' . $width . '" height="'. $height . '" bgcolor="' . esc_attr( $bg_color ) . '" font_color="' . esc_attr( $font_color ) . '"]' );

		echo $after_widget;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title' => false, 'user_id' => false, 'width' => 250, 'height' => 300, 'bg_color' => '#ffffff', 'font_color' => '#000000' ) );
		$title = esc_attr( $instance['title'] );

		$tpl = Hoppening_Client::get_template( 'admin/widget' );
		if ( empty( $tpl ) ) {
			return false;
		}

		include( $tpl );

		return true;
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['user_id'] = strip_tags( $new_instance['user_id'] );
		$instance['width'] = (int) $new_instance['width'] > 0 ? (int) $new_instance['width'] : '' ;
		$instance['height'] = (int) $new_instance['height'] > 0 ? (int) $new_instance['height'] : '';
		$instance['bg_color'] = strip_tags( $new_instance['bg_color'] );
		$instance['font_color'] = strip_tags( $new_instance['font_color'] );

		return $instance;
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("Hoppening_Widget");') );