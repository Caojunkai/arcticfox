<?php
defined('_JEXEC') or die;

$time=is_numeric($params->get('time')) ?  $params->get('time') : 5000;
$link = ModBannerHelper::getUrl($params);
$banner_info = ModBannerHelper::banner_get_img_arr($params);
$module_width=is_numeric($params->get('width')) ?  $params->get('width') : 700;
$module_height=is_numeric($params->get('height')) ?  $params->get('height') : 300;

$img_num = count($banner_info[0]);
$document = JFactory::getDocument();
$document->addScript('media/mod_show/js/jquery.min.js');
$document->addScript('media/mod_show/js/ck_slide.js');

?>
<style>

.mod-banner .ck-slidebox ul li.current em { background-color: #fe6500;}
.mod-banner .ck-slidebox ul li em:hover { background-color: #fe6500;}

.mod-banner { width:<?php echo $module_width;?>px; height:<?php echo $module_height;?>px; margin: 0 auto;}
.mod-banner ul.mod-banner-wrapper { height:<?php echo $module_height;?>px;}
</style>
		
		<!-- html -->
		<div class="mod-banner" style="position: relative; overflow: hidden;">
			<ul class="ck-slide-wrapper" style="margin: 0; padding: 0; list-style-type: none;position: absolute; top: 0; left: 0; z-index: 1; margin: 0; padding: 0;right:0;">
<?php if($img_num!=0) : ?>
	<?php for($i=0;$i<$img_num;$i++) : ?>
		<?php if($i==0) : ?>
 			 	<li style='position: absolute;'>
         			<a href="<?php echo $href=$link==false?'':$link[$banner_info[1][$i]];?>"><img src="<?php echo $banner_info[0][$i];?>" alt="" style='border:0;width:<?php echo $module_width;?>px;height:<?php echo $module_height;?>px;'></a>
      			</li>
      	<?php endif;?>
		<?php if($i>0) : ?>
			
 			 	<li style="display:none;position: absolute;">
         			<a href="<?php echo $href=$link==false?'':$link[$banner_info[1][$i]];?>"><img src="<?php echo $banner_info[0][$i];?>" alt="" style='border:0;width:<?php echo $module_width;?>px;height:<?php echo $module_height;?>px;'></a>
      			</li>
      	<?php endif;?>
    <?php endfor;?>
<?php endif;?>
			</ul>
			
			<div class="ck-slidebox" style="position: absolute; left: 50%; bottom: 12px; z-index: 30;">
				<div class="slideWrap">
					<ul class="dot-wrap" style="margin: 0; padding: 0; list-style-type: none;height: 20px; padding: 0 4px; border-radius: 8px; background: rgba(0,0,0,0.5);position:static;text-align:center;">
		
		
		<?php if($img_num!=0) : ?>
			<?php for($i=1;$i<=$img_num;$i++) : ?>
				<?php if($i==1) : ?>
					<li class='current' style='float: left; height: 12px; margin: 4px 4px;'><em style='display: block; width: 12px; height: 12px; border-radius: 100%; background-color: #fff; text-indent: -9999px; cursor: pointer;'>$i</em></li>
				<?php endif;?>
				<?php if($i>1) : ?>
					<li style='float: left; height: 12px; margin: 4px 4px;'><em style='display: block; width: 12px; height: 12px; border-radius: 100%; background-color: #fff; text-indent: -9999px; cursor: pointer;'>$i</em></li>
				<?php endif;?>
			<?php endfor;?>
		<?php endif;?>
					</ul>
				</div>
			</div>
		</div>
		
<script>
	var banner_num = <?php echo $img_num;?>;
	if(banner_num>1){
	$('.mod-banner').ckSlide({
		autoPlay:<?php echo $params->get('auto');?>,
        time:<?php echo $time;?>,
	});		
	}else{
		$(".ck-slidebox").hide();
		$('.mod-banner').ckSlide({
		autoPlay:false,
        time:<?php echo $time;?>,
	});		
	}
</script>
