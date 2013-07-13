<?php

// no direct access
defined('_JEXEC') or die('Restricted access');

// get helper
require_once (dirname(__FILE__).DS.'helper.php');

$document  = & JFactory::getDocument();

$banners = modrsbannersHelper::getHello( $params );
require(JModuleHelper::getLayoutPath('mod_rsbanners'));

?>