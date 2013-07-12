<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// require helper file
JLoader::register('rsbannersHelper', dirname(__FILE__) . DS . 'helpers' . DS . 'rsbanners.php');
 
// import joomla controller library
jimport('joomla.application.component.controller');
 
// Get an instance of the controller prefixed by HelloWorld
$controller = JController::getInstance('rsbanners');
 
// Perform the Request task
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));
 
// Redirect if set by the controller
$controller->redirect();