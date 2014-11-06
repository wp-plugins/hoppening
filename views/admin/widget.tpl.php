<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Widget title' , 'hoppening'); ?></label></p>
<p><input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" /></p>

<p><label for="<?php echo $this->get_field_id('user_id'); ?>"><?php _e( 'User ID' , 'hoppening'); ?></label></p>
<p><input class="widefat" id="<?php echo $this->get_field_id('user_id'); ?>" name="<?php echo $this->get_field_name('user_id'); ?>" type="text" value="<?php echo esc_attr( $instance['user_id'] ); ?>" /></p>

<p><label for="<?php echo $this->get_field_id('width'); ?>"><?php _e( 'Width' , 'hoppening'); ?></label></p>
<p><input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="number" value="<?php echo absint( $instance['width'] ); ?>" /></p>

<p><label for="<?php echo $this->get_field_id('height'); ?>"><?php _e( 'Height' , 'hoppening'); ?></label></p>
<p><input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="number" value="<?php echo absint( $instance['height'] ); ?>" /></p>

<p><label for="<?php echo $this->get_field_id('bg_color'); ?>"><?php _e( 'Background color' , 'hoppening'); ?></label></p>
<p><input class="color-picker-hex" id="<?php echo $this->get_field_id('bg_color'); ?>" name="<?php echo $this->get_field_name('bg_color'); ?>" type="text" value="<?php echo esc_attr( $instance['bg_color'] ); ?>" /></p>

<p><label for="<?php echo $this->get_field_id('font_color'); ?>"><?php _e( 'Font color' , 'hoppening'); ?></label></p>
<p><input class="color-picker-hex" id="<?php echo $this->get_field_id('font_color'); ?>" name="<?php echo $this->get_field_name('font_color'); ?>" type="text" value="<?php echo esc_attr( $instance['font_color'] ); ?>" /></p>

<script type="text/javascript">
	jQuery(document).ready(function(){
		//jQuery('.color-picker-hex').wpColorPicker();
	});
</script>