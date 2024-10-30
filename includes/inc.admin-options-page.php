<?php if ( !defined ( 'ABSPATH' ) ) exit; ?>
<div class="wrap">
	
	<h2>LBK Elements Settings</h2>

	<form id="landingOptions" method="post" action="options.php">
	<?php settings_fields( 'lbk_elements_settings' ); ?>

		<p>
			<input  type="checkbox" name="add_lbk_progess_line" value= 1 <?php if(get_option('add_lbk_progess_line')) echo 'checked'; ?> />
			<label for="add_lbk_progess_line">add_lbk_progess_line</label><br/>
		</p>

		<p>
			<input  type="checkbox" name="add_lbk_inline_post" value= 1 <?php if(get_option('add_lbk_inline_post')) echo 'checked'; ?> />
			<label for="add_lbk_inline_post">add_lbk_inline_post</label>
		</p>
		<p>
			<input  type="checkbox" name="add_lbk_slider_with_sub_imgs" value= 1 <?php if(get_option('add_lbk_slider_with_sub_imgs')) echo 'checked'; ?> />
			<label for="add_lbk_slider_with_sub_imgs">add_lbk_slider_with_sub_imgs</label>
		</p>
		<p>
			<input  type="checkbox" name="add_lbk_submenu_in_title" value= 1 <?php if(get_option('add_lbk_submenu_in_title')) echo 'checked'; ?> />
			<label for="add_lbk_submenu_in_title">add_lbk_submenu_in_title</label>
		</p>


		<p>Waitting for new elements.</p>
		
		<?php settings_fields( 'lbk_elements_settings' ); ?>

		<p class="submit">		
		<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
		
	</form>

	
</div>