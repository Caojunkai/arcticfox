<?php
defined('_JEXEC') or die;
// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';

$hello = modLunboHelper::getImg($params);
require JModuleHelper::getLayoutPath('mod_lunbo');