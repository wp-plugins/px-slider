/*-- PX Slider Admin Jquery Script
----------------------------------------*/
jQuery(document).ready(function(){
	jQuery('.pxs_uploadbtn').click(function() {
		 targetfield = jQuery(this).prev('.pxs_uploadimg');
		 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		 return false;
	});
	window.send_to_editor = function(html) {
		 imgurl = jQuery('img',html).attr('src');
		 jQuery(targetfield).val(imgurl);
		 tb_remove();
	}
	jQuery('.pxs_admintbl .pxs_bglyrset').click(function(){
		jQuery('.pxs_admintbl .pxs_bglyrset').removeClass('active');
		jQuery(this).addClass('active');
	});
	
});