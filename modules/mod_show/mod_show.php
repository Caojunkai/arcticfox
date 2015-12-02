<?php
defined('_JEXEC') or die;
require_once __DIR__ . '/helper.php';

// $url='media/jui/js/addform.js';

// $document = JFactory::getDocument();			这里的确添加成功了，但是实在前端添加的不是在后台的配置界面
// $document->addScript('anything');

//require JModuleHelper::getLayoutPath('mod_login', $layout);
require JModuleHelper::getLayoutPath('mod_show', 'default');

?>
<!--<script src="media/jui/js/addform.js"></script>		//这样也能够引入js-->			