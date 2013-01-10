<?php
//-- PX Slider Admin options ------------------------------
//---------------------------------------------------------
function pxslider_admin_page(){
	global $px_message; ?>
	<div class="wrap" style="width:820px;"><div id="icon-options-general" class="icon32"><br /></div>
	<?php if(isset($px_message) && $px_message) { ?><div class="updated" id="px_message"><p><strong><?php _e($px_message,'pxslider'); ?></strong></p></div><?php } ?>
	<h2><?php _e('PxSlider '.pxs_get_version().' options Page','pxslider'); ?></h2>
	<?php wp_nonce_field('update-options'); ?>
	<form method="post">
	<?php $options = get_option('pxslider_options'); ?>
		<?php echo pxslider_update(); ?>
		
		<?php
			if(mkdir(PXSLIDERPATH.'/tmp')){
			   rmdir(PXSLIDERPATH.'/tmp'); 
			}
			else{
				_e('<small class="pxs_oopserr">oops!!! Seems like the directory permission are not set right so you may see some distortion in images.<br/>Please set the directory permission for the folder "thumb" inside px-slider plugin directory to 777.</small>','pxslider');
			}
		?>
		
		<div id="poststuff">
			<div class="postbox" id="pxslider_wrap">
				<div class="handlediv" title="Click to toggle"><br/></div>
				<h3 class="hndle"><span><?php _e("General Settings", 'pxslider'); ?></span></h3>
				<div class="inside" style="padding: 10px;">		
					<input type="hidden" name="settings-updated" value="true">
					<table class="pxs_admintbl">
					
						<thead>
							<tr><td><?php _e("Select Category",'pxslider'); ?></td><td><?php wp_dropdown_categories( array( 'show_option_all' =>'' ,'taxonomy' => 'category','id'=>'px_catid','name' => 'pxslider_options[px_catid]','selected' =>$options['cat_id'] )); ?></td></tr>
							<tr><td><?php _e("No. of posts",'pxslider'); ?></td><td><input type="text" name="pxslider_options[no_of_posts]" value="<?php echo $options['no_of_posts'] ?>" size="2" />&nbsp;<small>(<?php _e("default: 3",'pxslider'); ?>)</small></td></tr>
						</thead>
						
							<tr><td><?php _e("Custom Images",'pxslider'); ?></td><td>&nbsp;<input type="checkbox" id="pxs_custmImgs" name="pxslider_options[customImgs]" <?php if($options['customImgs']){ ?> checked <?php } ?> value="true"/> <label for="pxs_custmImgs" ><?php _e('Check it, if you want to use <b>"Custom Images instead of Category".</b>.','pxslider') ?></label></td></tr>						
						
						<tr class="pxs_custmimgs">
							<td colspan="2">
							<table class="pxs_admintbl" cellspacing="0">
								<tr><td><?php _e("Custom Image-1 URL",'pxslider'); ?></td><td><input type="text" class="pxs_uploadimg" name="pxslider_options[img1url]" value="<?php echo $options['img1url'] ?>" /><input class="pxs_uploadbtn button" type="button" value="Upload Image" /></td></tr>
								<tr><td><?php _e("Custom Image-2 URL",'pxslider'); ?></td><td><input type="text" class="pxs_uploadimg" name="pxslider_options[img2url]" value="<?php echo $options['img2url'] ?>" /><input class="pxs_uploadbtn button" type="button" value="Upload Image" /></td></tr>
								<tr><td><?php _e("Custom Image-3 URL",'pxslider'); ?></td><td><input type="text" class="pxs_uploadimg" name="pxslider_options[img3url]" value="<?php echo $options['img3url'] ?>" /><input class="pxs_uploadbtn button" type="button" value="Upload Image" /></td></tr>
								<tr><td><?php _e("Custom Image-4 URL",'pxslider'); ?></td><td><input type="text" class="pxs_uploadimg" name="pxslider_options[img4url]" value="<?php echo $options['img4url'] ?>" /><input class="pxs_uploadbtn button" type="button" value="Upload Image" /></td></tr>
								<tr><td><?php _e("Custom Image-5 URL",'pxslider'); ?></td><td><input type="text" class="pxs_uploadimg" name="pxslider_options[img5url]" value="<?php echo $options['img5url'] ?>" /><input class="pxs_uploadbtn button" type="button" value="Upload Image" /></td></tr>
								<tr><td><?php _e("Custom Image-6 URL",'pxslider'); ?></td><td><input type="text" class="pxs_uploadimg" name="pxslider_options[img6url]" value="<?php echo $options['img6url'] ?>" /><input class="pxs_uploadbtn button" type="button" value="Upload Image" /></td></tr>	
							</table>
							</td>
						</tr>
					
						<tr><td><?php _e("Select Bg Layers Set",'pxslider'); ?></td>
						<td>
							<label class="pxs_bglyrset <?php if($options['bglayerSet'] == "Set-1"){ echo "active";} ?>" for="pxs_bglyrset1" style="background:#e7e7e7 url('<?php echo plugins_url('images/',__FILE__) ?>set1.jpg');"><input type="radio" name="pxslider_options[bglayerSet]" <?php if($options['bglayerSet'] == "Set-1"){ echo "checked='checked'";} ?> value="Set-1" id="pxs_bglyrset1" ></label>
							<label class="pxs_bglyrset <?php if($options['bglayerSet'] == "Set-2"){ echo "active";} ?>" for="pxs_bglyrset2" style="background:#e7e7e7 url('<?php echo plugins_url('images/',__FILE__) ?>set2.jpg');"><input type="radio" name="pxslider_options[bglayerSet]" <?php if($options['bglayerSet'] == "Set-2"){ echo "checked='checked'";} ?> value="Set-2" id="pxs_bglyrset2" ></label>
							<label class="pxs_bglyrset <?php if($options['bglayerSet'] == "Set-3"){ echo "active";} ?>" for="pxs_bglyrset3" style="background:#e7e7e7 url('<?php echo plugins_url('images/',__FILE__) ?>set3.jpg');"><input type="radio" name="pxslider_options[bglayerSet]" <?php if($options['bglayerSet'] == "Set-3"){ echo "checked='checked'";} ?> value="Set-3" id="pxs_bglyrset3" ></label>
							<label class="pxs_bglyrset <?php if($options['bglayerSet'] == "Set-4"){ echo "active";} ?>" for="pxs_bglyrset4" style="background:#e7e7e7 url('<?php echo plugins_url('images/',__FILE__) ?>set4.jpg');"><input type="radio" name="pxslider_options[bglayerSet]" <?php if($options['bglayerSet'] == "Set-4"){ echo "checked='checked'";} ?> value="Set-4" id="pxs_bglyrset4" ></label>
						</td>
						</tr>						
						<tr><td><?php _e("Custom Bg Layer's",'pxslider'); ?></td><td>&nbsp;<input type="checkbox" id="pxs_custmchk" name="pxslider_options[customBgs]" <?php if($options['customBgs']){ ?> checked <?php } ?> value="true"/> <label for="pxs_custmchk" ><?php _e('Check it, if you want to use <b>"Custom Bg-Layers"</b>.','pxslider') ?></label></td></tr>						
						<tr><td><?php _e("Custom Bg-Layer-1 URL",'pxslider'); ?></td><td><input type="text" class="pxs_uploadimg" name="pxslider_options[bg1url]" value="<?php echo $options['bg1url'] ?>" /><input class="pxs_uploadbtn button" type="button" value="Upload Image" /></td></tr>
						<tr><td><?php _e("Custom Bg-Layer-2 URL",'pxslider'); ?></td><td><input type="text" class="pxs_uploadimg" name="pxslider_options[bg2url]" value="<?php echo $options['bg2url'] ?>" /><input class="pxs_uploadbtn button" type="button" value="Upload Image" /></td></tr>
						<tr><td><?php _e("Custom Bg-Layer-3 URL",'pxslider'); ?></td><td><input type="text" class="pxs_uploadimg" name="pxslider_options[bg3url]" value="<?php echo $options['bg3url'] ?>" /><input class="pxs_uploadbtn button" type="button" value="Upload Image" /></td></tr>
						<tr><td><?php _e("Duration between slides",'pxslider'); ?></td><td><input type="text" name="pxslider_options[auto_play]" value="<?php echo $options['auto_play'] ?>" size="3" />&nbsp;<?php _e("in ms",'pxslider'); ?>&nbsp;<small>(<?php _e("default: 5000",'pxslider'); ?>)</small></td></tr>
						<tr><td><?php _e("Transition Speed",'pxslider'); ?></td><td><input type="text" name="pxslider_options[slide_speed]" value="<?php echo $options['slide_speed'] ?>" size="3" />&nbsp;<?php _e("in ms",'pxslider'); ?>&nbsp;<small>(<?php _e("default: 1000",'pxslider'); ?>)</small></td></tr>
						<tr><td><?php _e("Thumbnail Rotation",'pxslider'); ?></td><td><select name="pxslider_options[thumbRotation]"><option value="true" <?php selected('true', $options['thumbRotation']); ?>><?php _e("Yes",'pxslider'); ?></option><option value="false" <?php selected('false', $options['thumbRotation']); ?>><?php _e("No",'pxslider'); ?></option></select></td></tr>
						<tr><td><?php _e("Show navigation buttons",'pxslider'); ?></td><td><select name="pxslider_options[navigation]"><option value="true" <?php selected('true', $options['navigation']); ?>><?php _e("Yes",'pxslider'); ?></option><option value="false" <?php selected('false', $options['navigation']); ?>><?php _e("No",'pxslider'); ?></option></select></td></tr>
						<tr><td><?php _e("Circulation",'pxslider'); ?></td><td><select name="pxslider_options[circular]"><option value="true" <?php selected('true', $options['circular']); ?>><?php _e("Yes",'pxslider'); ?></option><option value="false" <?php selected('false', $options['circular']); ?>><?php _e("No",'pxslider'); ?></option></select></td></tr>
						<tr><td colspan="2"><br/><input type="submit" name="parallax_slider_submit" class="button button-primary" value="<?php _e('Save Settings','pxslider') ?>" /></td></tr>
					</table>
				</div>
			</div>
		</div>
	</form>
	
	<iframe class="pxslider_iframe" src="http://www.sketchthemes.com/sketch-updates/plugin-updates/px-slider-lite/pxslider.php" width="250px" height="465px" scrolling="no" ></iframe> 
</div>
<?php
}
function pxslider_updates(){
$update_options = $_REQUEST['pxslider_options'];
	$updates = array(
	'cat_id' => $update_options['px_catid'],
	'no_of_posts' =>$update_options['no_of_posts'],
	'customImgs' =>$update_options['customImgs'],
	'img1url' =>$update_options['img1url'],
	'img2url' =>$update_options['img2url'],
	'img3url' =>$update_options['img3url'],
	'img4url' =>$update_options['img4url'],	
	'img5url' =>$update_options['img5url'],
	'img6url' =>$update_options['img6url'],	
	'bglayerSet' =>$update_options['bglayerSet'],
	'customBgs' =>$update_options['customBgs'],
	'bg1url' =>$update_options['bg1url'],
	'bg2url' =>$update_options['bg2url'],
	'bg3url' =>$update_options['bg3url'],
	'auto_play' => $update_options['auto_play'],
	'slide_speed' => $update_options['slide_speed'],
	'thumbRotation' => $update_options['thumbRotation'],
	'navigation' => $update_options['navigation'],
	'circular' =>$update_options['circular']
    );
return $updates;
}
// Reset to defaults
if (isset($_POST['pxslider-reset']) && $_POST['pxslider-reset'] == 1) {
    update_option('pxslider_options', pxslider_defaults());
    $px_message = 'Settings Reset to Default';
}
// Updated message
if ($_POST['settings-updated'] == 'true') {
    $px_message = 'Settings saved';
}	
// Updated slider options
if(isset($_POST['parallax_slider_submit'])){
	update_option('pxslider_options', pxslider_updates());	
}
//---------------------------------------------------------//
?>