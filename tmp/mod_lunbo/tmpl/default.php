<?php
defined('_JEXEC') or die;

$mod_width = is_numeric($params->get("width")) ? $params->get('width') : 1000;
$imgUrl = ModLunBoHelper::getImg($params);
JHtml::_('stylesheet', 'mod_lunbo/main.css', array(), true);
JHtml::_('script', 'mod_lunbo/main.js', array(), true);
JHtml::_('script', 'mod_lunbo/slider.js', array(), true);
//JHtml::stylesheet('mod_lunbo/search.css', array(), true);
//JHtml::script('mod_lunbo/jquery.banner.js',false,true);

?>
<div id="banner_tabs" class="flexslider">
    <ul class="slides">
        <li>
            <a title="" target="_blank" href="#">
                <img width="1920" height="482" alt="" style="background: url(http://7xlqsh.com1.z0.glb.clouddn.com/img1.jpg) no-repeat center;" src="http://7xlqsh.com1.z0.glb.clouddn.com/alpha.png">
            </a>
        </li>
        <li>
            <a title="" href="#">
                <img width="1920" height="482" alt="" style="background: url(http://7xlqsh.com1.z0.glb.clouddn.com/img2.jpg) no-repeat center;" src="http://7xlqsh.com1.z0.glb.clouddn.com/alpha.png">
            </a>
        </li>
        <li>
            <a title="" href="#">
                <img width="1920" height="482" alt="" style="background: url(http://7xlqsh.com1.z0.glb.clouddn.com/img3.jpg) no-repeat center;" src="http://7xlqsh.com1.z0.glb.clouddn.com/alpha.png">
            </a>
        </li>

    </ul>
    <ul class="flex-direction-nav">
        <li><a class="flex-prev" href="javascript:;">Previous</a></li>
        <li><a class="flex-next" href="javascript:;">Next</a></li>
    </ul>
    <ol id="bannerCtrl" class="flex-control-nav flex-control-paging">
        <li><a>1</a></li>
        <li><a>2</a></li>
        <li><a>3</a></li>
    </ol>
</div>

