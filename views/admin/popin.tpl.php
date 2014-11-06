<script type="text/javascript">
	jQuery('.color-picker-hex').wpColorPicker();
</script>
<h3 class="media-title"><?php _e('Insert an Hoppening agenda', 'hoppening'); ?></h3>

<form name="hoppening_shortcode_generator" id="hoppening_shortcode_generator">
	<div id="media-items">
		<div class="media-item media-blank">
			<table class="describe" style="width:100%;"><tbody>

				<tr valign="top" class="field">
					<th class="label" scope="row"><label for="hoppening_user_id"><?php _e('Hoppening user ID', 'hoppening'); ?></th>
					<td>
						<input id="hoppening_user_id" style="width:200px;" type="text" name="hoppening_user_id" />
					</td>
				</tr>

				<tr valign="top" class="field">
					<th class="label" scope="row"><label for="hoppening_width"><span class="alignleft"><?php _e('Width', 'hoppening'); ?></span></label></th>
					<td><input id="hoppening_width" style="width:100px;" value="600" type="number" min="0" max="2000" name="hoppening_width" /> <?php _e('px', 'hoppening'); ?></td>
				</tr>

				<tr valign="top" class="field">
					<th class="label" scope="row"><label for="hoppening_height"><span class="alignleft"><?php _e('Height', 'hoppening'); ?></span></label></th>
					<td><input id="hoppening_height" style="width:100px;" value="300" type="number" min="0" max="2000" name="hoppening_height" /> <?php _e('px', 'hoppening'); ?></td>
				</tr>

				<tr valign="top" class="field">
					<th class="label" scope="row"><label for="hoppening_bgcolor"><span class="alignleft"><?php _e('Background color', 'hoppening'); ?></span></label></th>
					<td><input id="hoppening_bgcolor" class="color-picker-hex" style="width:100px;" type="text" value="#FFFFFF" name="hoppening_bgcolor" /></td>
				</tr>

				<tr valign="top" class="field">
					<th class="label" scope="row"><label for="hoppening_font_color"><span class="alignleft"><?php _e('Font color', 'hoppening'); ?></span></label></th>
					<td><input id="hoppening_font_color" class="color-picker-hex" style="width:100px;" type="text" value="#000000" name="font_color" /></td>
				</tr>

				<tr valign="top" class="field">
					<td>
						<input name="insert_hoppening_shortcode" type="submit" class="button-primary" id="insert_hoppening_shortcode" tabindex="5" accesskey="p" value="<?php _e('Insert the Hoppening shortcode', 'hoppening') ?>">
					</td>
				</tr>

				</tbody></table>
		</div>
	</div>

</form>