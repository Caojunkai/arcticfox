<?php
defined('_JEXEC') or die;
 //var_dump($params);die;
$mudel_width = $params->get('width');
$mudel_height = $params->get('height');
$time = $params->get('time');
if($time==null)
{
   $time = 10000;
}
$inner_width = ($mudel_width-110)/3;
$img_height = $mudel_height/2.8;
$img_width = ($mudel_width-110)/3;

$show_start = $params->get('auto');

JHtml::_('bootstrap.tooltip');

$img_info = ModShowHelper::show_get_img_arr($params);
$href = ModShowHelper::getUrl($params);
$suffix = $img_info[0];
$menu_ids = $img_info[1];
$img_num = count($img_info[0]);
//echo $img_num;die;
$page_num = ceil($img_num/3);
// JHtml::_('jquery.framework');
$document = JFactory::getDocument();
$document->addScript('media/mod_show/js/jquery.min.js');
$document->addScript('media/mod_show/js/ck_slide.js');



?>




<style type="text/css">
.ck-slide .ck-prev, .ck-slide .ck-next { position: absolute; top: 50%; z-index: 2; width: 35px; height: 70px; margin-top: -35px; border-radius: 3px; opacity: .15; background: red; text-indent: -9999px; background-repeat: no-repeat; transition: opacity .2s linear 0s;}
.ck-slide .ck-prev { left: 5px; background: url(media/mod_show/image/arrow-left.png) #000 50% no-repeat;}
.ck-slide .ck-next { right: 5px; background: url(media/mod_show/image/arrow-right.png) #000 50% no-repeat;}

.ck-slide { width:<?php echo $mudel_width;?>px; height:<?php echo $mudel_height;?>px; margin: 0 auto;}
.ck-slide ul.ck-slide-wrapper { height:<?php echo $mudel_height;?>px;}
</style>

      <!-- html -->
      <div class="ck-slide" style="position: relative; overflow: hidden;">
         <ul class="ck-slide-wrapper" style="text-align:center;margin: 0; padding: 0; list-style-type: none;position: absolute; top: 0; left: 0; z-index: 1; margin: 0; padding: 0;right:0;">
<?php 
if($img_num!=0)
{
      
      for($j=0;$j<$page_num;$j++)
      {
         if($j==0)
         {
            
            echo "<li style='position: absolute;'>";

            for($i=1;$i<=3;$i++)
            {
            $hz = $suffix[$i-1];
            $menu_id = $menu_ids[$i-1];
            $topContent = $params->get('topcontent_'.$hz);
            $midContent = $params->get('midcontent_'.$hz);
            $img_url = $params->get('image_'.$hz);
            echo "<div class='inneritem' style='float:left;border:0;padding:0;margin:18px;width:$inner_width"."px'>";
            echo <<<EDG
            <img src="$img_url" alt="someting wrong"
EDG;
            echo "style='border:0;padding:0;margin:0;width:$img_width"."px;height:$img_height"."px'>";
            echo <<<EOT
            <div><p>$topContent</p></div>
            <div><p>$midContent</p></div>
            <div><p><a href="$href[$menu_id]">详情</a></p></div>
            </div>
EOT;
            }

         }else{
           echo "<li style='display:none;position: absolute;'>";
            for($i=3*$j+1;$i<=$img_num;$i++)
               {
                  $hz = $suffix[$i-1];
                  $menu_id = $menu_ids[$i-1];
                  $topContent = $params->get('topcontent_'.$hz);
                  $midContent = $params->get('midcontent_'.$hz);
                  $img_url = $params->get('image_'.$hz);
                  echo "<div class='inneritem' style='float:left;margin:18px;width:$inner_width"."px'>";
            echo <<<EDG
            <img src="$img_url" alt="someting wrong"
EDG;
            echo "style='border:0;width:$img_width"."px;height:$img_height"."px'>";
            echo <<<EOT
            <div><p>$topContent</p></div>
            <div><p>$midContent</p></div>
            <div><p><a href="$href[$menu_id]">详情</a></p></div>
            </div>
EOT;
               }          
         }

         
      }
}
?>

         </li>
         </ul>
         <a href="javascript:" class="ctrl-slide ck-prev">上一张</a> <a href="javascript:" class="ctrl-slide ck-next">下一张</a>
      </div>
<script>
         $('.ck-slide').ckSlide({
            autoPlay:<?php echo $show_start;?>,
            time:<?php echo $time?>,
         });
</script>
