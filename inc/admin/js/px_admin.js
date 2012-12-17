/*-- PX Slider Admin Jquery Script
----------------------------------------*/
jQuery(document).ready(function(){

/*-- Upload image jquery start 
--------------------------------------------*/
	var targetfield= '';
	var pxs_send_to_editor = window.send_to_editor;
	jQuery('.pxs_uploadbtn').click(function(){
		targetfield = jQuery(this).prev('.pxs_uploadimg');
		tb_show('', 'media-upload.php?type=image&TB_iframe=true');
		window.send_to_editor = function(html) {
			imgurl = jQuery('img',html).attr('src');
			jQuery(targetfield).val(imgurl);
			tb_remove();
			window.send_to_editor = pxs_send_to_editor;
		}
		return false;
	});	
/*-------------------------------------------*/
	jQuery('.pxs_admintbl .pxs_bglyrset').click(function(){
		jQuery('.pxs_admintbl .pxs_bglyrset').removeClass('active');
		jQuery(this).addClass('active');
	});
});