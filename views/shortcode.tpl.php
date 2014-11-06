<iframe
	<?php echo ( (int) $width > 0 ) ? 'width="' . (int) $width . '"' : ''; ?>
	<?php echo ( (int) $height > 0 ) ? 'height="' . (int) $height . '"' : 'height="auto"'; ?>
	 src="http://widgets.hoppening.com/#/?c=<?php echo $bg_color; ?>&f=<?php echo $font_color; ?><?php echo ( (int) $height > 0 ) ? '&height=' . (int) $height : ''; ?>&user_id=<?php echo $user_id; ?>" ></iframe>