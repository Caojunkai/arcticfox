<?php
defined('_JEXEC') or die;

$time=is_numeric($params->get('time')) ?  $params->get('time') : 10000;
$module_width=is_numeric($params->get('width')) ?  $params->get('width') : 950;
$module_height=is_numeric($params->get('height')) ?  $params->get('height') : 250;
$suffix = ModShowHelper::show_get_img_arr($params)[0];
$menu_ids = ModShowHelper::show_get_img_arr($params)[1];
$img_num = count(ModShowHelper::show_get_img_arr($params)[0]);
$href = ModShowHelper::getUrl($params);
$page_num = ceil($img_num/3);

$document = JFactory::getDocument();
$document->addScript('media/mod_show/js/jquery.min.js');
$document->addScript('media/mod_show/js/ck_slide.js');

?>

<style type="text/css">
.ck-slide .ck-prev, .ck-slide .ck-next { position: absolute; top: 50%; z-index: 2; width: 35px; height: 70px; margin-top: -35px; border-radius: 3px; opacity: .15; background: red; text-indent: -9999px; background-repeat: no-repeat; transition: opacity .2s linear 0s;}
.ck-slide .ck-prev { display:none;left: 5px; background: url(<?php echo JURI::base(true).'/media/mod_show/image/arrow-left.png';?>) #000 50% no-repeat;}
.ck-slide .ck-next { display:none;right: 5px; background: url(<?php echo JURI::base(true).'/media/mod_show/image/arrow-right.png';?>) #000 50% no-repeat;}

.ck-slide { width:<?php echo $module_width;?>px; height:<?php echo $module_height;?>px; margin: 0 auto;}
.ck-slide ul.ck-slide-wrapper { height:<?php echo $module_height;?>px;}
</style>

      <!-- html -->
      <div class="ck-slide" style="position: relative; overflow: hidden;">
         <ul class="ck-slide-wrapper" style="text-align:center;margin: 0; padding: 0; list-style-type: none;position: absolute; top: 0; left: 0; z-index: 1; margin: 0; padding: 0;right:0;">

<?php if($img_num>=3) : ?>
      
    <?php for($j=0;$j<$page_num;$j++) : ?>
      
        <?php if($j==0) : ?>
            <li style='position: absolute;'>
         
            <?php for($i=1;$i<=3;$i++) : ?>

            <div class='inneritem' style='float:left;border:0;padding:0;margin:18px;width:<?php echo ($module_width-110)/3;?>px'>
          
            	<img src="<?php echo $params->get('image_'.$suffix[$i-1]);?>" alt="someting wrong" style='border:0;padding:0;margin:15px 0;
            	width:<?php echo ($module_width-110)/3;?>px;height:<?php echo $module_height/2.8;?>px'>
            	<div><p><?php echo $params->get('topcontent_'.$suffix[$i-1]);?></p></div>
            	<div><p><?php echo $params->get('midcontent_'.$suffix[$i-1]);?></p></div>
            	<div>
            		<p><a href="<?php echo $last_ret=$href==false?'':$href[$menu_ids[$i-1]];?>">详情</a></p>
            	</div>
            </div>
        
        	<?php endfor;?>

		<?php endif;?>

		<?php if($j>0) : ?>
        <li style='display:none;position: absolute;'>
        	<?php for($i=3*$j+1;$i<=$img_num;$i++) : ?>

                  <div class='inneritem' style='float:left;margin:18px;width:<?php echo ($module_width-110)/3;?>px'>

            			<img src="<?php echo $params->get('image_'.$suffix[$i-1]);?>" alt="someting wrong" style='border:0;padding:0;margin:15px 0;
            			width:<?php echo ($module_width-110)/3;?>px;height:<?php echo $module_height/2.8;?>px'>
            			<div><p><?php echo $params->get('topcontent_'.$suffix[$i-1]);?></p></div>
            			<div><p><?php echo $params->get('midcontent_'.$suffix[$i-1]);?></p></div>
            			<div>
            				<p><a href="<?php echo $last_ret=$href==false?'':$href[$menu_ids[$i-1]];?>">详情</a></p>
            			</div>
            	   </div>
        	<?php endfor;?>
        <?php endif;?>  
         </li>
    <?php endfor;?>
<?php endif;?>

<?php if($img_num<3) : ?>
    <li style='position: absolute;'>
      <?php for($i=1;$i<=$img_num;$i++) : ?>
        <?php if($img_num==1) : ?>
          <div class='inneritem' style='float:left;border:0;padding:0;margin:0;width:<?php echo $module_width?>px;height:<?php echo $module_height;?>px;'>
              <img src="<?php echo $params->get('image_'.$suffix[$i-1]);?>" alt="someting wrong" style='border:0;padding:0;margin:15px 0;
              width:<?php echo ($module_width-20);?>px;height:<?php echo $module_height/2;?>px'>
              <div><p><?php echo $params->get('topcontent_'.$suffix[$i-1]);?></p></div>
              <div><p><?php echo $params->get('midcontent_'.$suffix[$i-1]);?></p></div>
              <div>
                  <p><a href="<?php echo $last_ret=$href==false?'':$href[$menu_ids[$i-1]];?>">详情</a></p>
              </div>
          </div>
        <?php endif;?>
        <?php if($img_num==2) : ?>
          <div class='inneritem' style='float:left;border:0;padding:0;margin:0 25px;width:<?php echo ($module_width-100)/2;?>px;height:<?php echo $module_height;?>px;'>
              <img src="<?php echo $params->get('image_'.$suffix[$i-1]);?>" alt="someting wrong" style='border:0;padding:0;margin:15px 0;
              width:<?php echo ($module_width-100)/2;?>px;height:<?php echo $module_height/2;?>px'>
              <div><p><?php echo $params->get('topcontent_'.$suffix[$i-1]);?></p></div>
              <div><p><?php echo $params->get('midcontent_'.$suffix[$i-1]);?></p></div>
              <div>
                  <p><a href="<?php echo $last_ret=$href==false?'':$href[$menu_ids[$i-1]];?>">详情</a></p>
              </div>
          </div>
        <?php endif;?>
        <?php if($img_num==0) : ?>
          <div></div>
        <?php endif;?>
      <?php endfor;?>
    </li>
  <?php endif;?>
         </ul>
         <a href="javascript:" class="ctrl-slide ck-prev">上一张</a> <a href="javascript:" class="ctrl-slide ck-next">下一张</a>
      </div>
<script>
    var num=<?php echo $img_num;?>;
      $('.ck-slide').ckSlide({
            autoPlay:false,
         });  
    if(num>3){
      $('.ck-slide .ck-prev,.ck-slide .ck-next').show();
      $('.ck-slide').ckSlide({
            autoPlay:<?php echo $params->get('auto');?>,
            time:<?php echo $time?>,
         });  
    }

</script>