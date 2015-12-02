<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_baidumap
 *
 * @copyright   Copyright (C) 陈星. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$doc    = JFactory::getDocument();
$doc->addScript('//api.map.baidu.com/api?key=&v=1.1&services=true');
//JHTML::script('//api.map.baidu.com/api?key=&v=1.1&services=true');
?>
<!--星仔码头百度地图模块-->
<div class="baidumap<?php echo $moduleclass_sfx ?>">
 <!--百度地图容器-->
  <div style="width:<?php echo $width; ?>;height:<?php echo $height; ?>" id="dituContent<?php echo $module->id; ?>"> 
  </div>
</div>
<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
        addMarker();//向地图中添加marker
    }
    
    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("dituContent<?php echo $module->id; ?>");//在百度地图容器中创建一个地图
        var point = new BMap.Point(<?php echo $point_c; ?>);//定义一个中心点坐标
        map.centerAndZoom(point,<?php echo $level; ?>);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }
    
    //地图事件设置函数：
    function setMapEvent(){
        <?php if($params->get('drag')): ?>
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        <?php else: ?>
        map.disableDragging();//禁用地图拖拽事件
        <?php endif; ?>
        <?php if($params->get('mouse')): ?>
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        <?php else: ?>
         map.disableScrollWheelZoom();//禁用地图滚轮放大缩小，默认禁用(可不写)
        <?php endif; ?>
        <?php if($params->get('double')): ?>
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        <?php else: ?>
        map.disableDoubleClickZoom();//禁用鼠标双击放大
        <?php endif; ?>
        <?php if($params->get('keyboard')): ?>
        map.enableKeyboard();//启用键盘上下左右键移动地图
         <?php else: ?>
        map.disableKeyboard();//禁用键盘上下左右键移动地图，默认禁用(可不写)
        <?php endif; ?>
    }
    
    //地图控件添加函数：
    function addMapControl(){
        <?php if($params->get('map_zoom')): ?>
            //向地图中添加缩放控件
    var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_<?php echo $params->get('zoom_position'); ?>,type:BMAP_NAVIGATION_CONTROL_<?php echo $params->get('zoom_style'); ?>});
    map.addControl(ctrl_nav);
        <?php endif; ?>

        <?php if($params->get('thumb')): ?>
         //向地图中添加缩略图控件
    var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_<?php echo $params->get('thumb_position'); ?>,isOpen:<?php echo $params->get('thumb_status'); ?>});
    map.addControl(ctrl_ove);
    <?php endif; ?>

    <?php if($params->get('scale')): ?>
         //向地图中添加比例尺控件
    var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_<?php echo $params->get('scale_position'); ?>});
    map.addControl(ctrl_sca);
      <?php if($params->get('scale_unit')): ?>
      ctrl_sca.setUnit(BMAP_UNIT_IMPERIAL)
      <?php endif; ?>
    <?php endif; ?>
    }
   //标注点数组
    var markerArr = [
   <?php 
            $arr_count = count($point_marker_arr);//统计坐标个数
            $isopen = '';             
        for ( $i = 0; $i < $arr_count; $i++) {           
            if($i == 0){
                $isopen = '1';
                $douhao = '';                                        
            }else{
                $isopen = '0';
                $douhao = ',';
            }
            echo $douhao.'{title:"'.$marker_title_arr[$i].'",content:"'.$marker_content_arr[$i].'",point:"'.$point_marker_arr[$i].'",isOpen:'.$isopen.',icon:{'.$icon.'}}';           
        };
    ?>
    ];


    //创建marker
    function addMarker(){
        for(var i=0;i<markerArr.length;i++){
            var json = markerArr[i];
            var p0 = json.point.split(",")[0];
            var p1 = json.point.split(",")[1];
            var point = new BMap.Point(p0,p1);
            var iconImg = createIcon(json.icon);
            var marker = new BMap.Marker(point,{icon:iconImg});
            var iw = createInfoWindow(i);
            var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
            marker.setLabel(label);
            map.addOverlay(marker);
            label.setStyle({
                        borderColor:"#808080",
                        color:"#555",
                        cursor:"pointer"
            });
            
            (function(){
                var index = i;
                var _iw = createInfoWindow(i);
                var _marker = marker;
                _marker.addEventListener("click",function(){
                    this.openInfoWindow(_iw);
                });
                _iw.addEventListener("open",function(){
                    _marker.getLabel().hide();
                })
                _iw.addEventListener("close",function(){
                    _marker.getLabel().show();
                })
                label.addEventListener("click",function(){
                    _marker.openInfoWindow(_iw);
                })
                if(!!json.isOpen){
                    label.hide();
                    _marker.openInfoWindow(_iw);
                }
            })()
        }
    }
    //创建InfoWindow
    function createInfoWindow(i){
        var json = markerArr[i];
        var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
        return iw;
    }
    //创建一个Icon
    function createIcon(json){
        var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
        return icon;
    }
    
    initMap();//创建和初始化地图
</script>