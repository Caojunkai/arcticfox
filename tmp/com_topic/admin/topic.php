<?php
defined('_JEXEC') or die;

$controller = JControllerLegacy::getInstance('Topic');

$controller->execute(JFactory::getApplication()->input->getCmd('task'));

$controller->redirect();
