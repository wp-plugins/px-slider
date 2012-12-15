<?php
function pxslider(){
$options = get_option('pxslider_options');
$px_auto = $options['auto_play'];
$px_nop  = $options['no_of_posts']; 
$px_speed  = $options['slide_speed']; 
if($px_auto ==""){$px_auto = 5000;}
if($px_nop =="" || $px_nop==0){$px_nop=3;}
if($px_speed =="" || $px_speed==0){$px_speed = 1000;}
?>
<!-- PX SLIDER START'S HERE -->
	<script type="text/javascript">
		// <[CDATA[
			jQuery(document).ready(function() {
			jQuery('#px_slider').pxSlider({
			auto:<?php echo $px_auto; ?>,
			speed:<?php echo $px_speed; ?>,
			circular: <?php echo $options['circular']; ?>,
			thumbRotation:<?php echo $options['thumbRotation']; ?>
			});
		});
		// ]]>
	</script>
<?php
	query_posts('order=desc&cat=' . $options['cat_id'] . '&posts_per_page= ' . $px_nop . '');
	if (have_posts()) : ?>	
		<div id="px_slider">
			<div class="pxs_bg <?php if($options['customBgs']){ echo "pxs_custom"; } else{ echo $options['bglayerSet']; }?>"><div class="pxs_bg1" style="background-image"></div><div class="pxs_bg2"></div><div class="pxs_bg3"></div></div>
			<div class="pxs_loading"><?php _e('Loading images...','pxslider'); ?></div>			
			<div class="pxs_slider_wrapper">
				<ul class="pxs_slider" style="clear:both;">
					<?php while(have_posts()) : the_post(); ?>
					<li>
					<?php
						if(has_post_thumbnail()){$slide_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );}
						else{$slide_url = plugins_url('',__FILE__).'/default/no-featured.jpg'; }
						$pxs_ptitle = get_the_title();
					?>
						<span>
							<a href="<?php echo get_permalink(); ?>" title=""><img src="<?php echo plugins_url('/thumb',__FILE__); ?>/timthumb.php?src=<?php echo $slide_url; ?>&h=280&w=760&zc=1" />
							<?php if($pxs_ptitle){ ?><div class="pxs_ptitle"><?php echo $pxs_ptitle; ?></div><?php } ?></a>
						</span>
					</li>
					<?php endwhile; ?>
				</ul>
				<div class="pxs_navigation"><span class="pxs_next"></span><span class="pxs_prev"></span></div>
				<ul class="pxs_thumbnails">
					<?php while ( have_posts() ) : the_post(); ?>
					<?php
						if(has_post_thumbnail()){$thumbsrc = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );}
						else{$thumbsrc = plugins_url('',__FILE__).'/default/no-thumb.jpg'; }
					?>
					<li><img src="<?php echo plugins_url('/thumb',__FILE__); ?>/timthumb.php?src=<?php echo $thumbsrc; ?>&h=55&w=80&zc=1" /></li>
					<?php endwhile; ?>	
				</ul>
			</div>
			<a class="pxs_fromthis" target="_blank" href="http://www.wpfruits.com/downloads/wp-plugins/px-slider-wordpress-plugin/?ret=pxs" title=""></a>
		</div>
		<?php  
	else:   
	endif; 
	wp_reset_query();
?>
<style type="text/css">
<?php if($options['navigation'] != 'true'){ ?>#px_slider .pxs_navigation {display:none;} <?php } ?>
<?php if($options['customBgs']) { ?>
<?php if($options['bg1url']){ ?>#px_slider .pxs_bg .pxs_bg1 {background-image: url("<?php echo $options['bg1url']; ?>");} <?php } ?>
<?php if($options['bg2url']){ ?>#px_slider .pxs_bg .pxs_bg2 {background-image: url("<?php echo $options['bg2url']; ?>");} <?php } ?>
<?php if($options['bg3url']){ ?>#px_slider .pxs_bg .pxs_bg3 {background-image: url("<?php echo $options['bg3url']; ?>");} <?php } ?>
<?php 
} 
else{ ?>
#px_slider .pxs_bg .pxs_bg1{ background-image:url(<?php echo plugins_url('default/',__FILE__).$options['bglayerSet']; ?>/bg1.png);} 
#px_slider .pxs_bg .pxs_bg2{ background-image:url(<?php echo plugins_url('default/',__FILE__).$options['bglayerSet']; ?>/bg2.png);} 
#px_slider .pxs_bg .pxs_bg3{ background-image:url(<?php echo plugins_url('default/',__FILE__).$options['bglayerSet']; ?>/bg3.png);} 
<?php } ?>

</style>
<!-- PX SLIDER END'S HERE -->
<?php	
}
?>