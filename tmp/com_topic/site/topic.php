<?php
defined('_JEXEC') or die;

// Get an instance of the controller prefixed by HelloWorld
$controller = JControllerLegacy::getInstance('Topic');

$input = JFactory::getApplication()->input;
// Perform the Request task
$controller->execute($input->getCmd('task'));

$controller->redirect();