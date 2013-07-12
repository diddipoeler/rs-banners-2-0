<?php
/**
 * @version 1.5.0 $Id: mod_banners.php
 * @package Joomla 1.5.x
 * @subpackage RS-Banners Modules only for RS-Banners Component
 * @copyright (C) 2009 RS Web Solutions (http://www.rswebsols.com)
 * @license GNU/GPL
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
error_reporting(E_ALL ^ E_NOTICE);

if(!function_exists(fetchAdRSB)) {
	function fetchAdRSB($cid) {
		$db =& JFactory::getDBO();
		$db->setQuery("select count(*) as tot from `#__rsbanners_ad` where `cid`='".$cid."'");
		$tot = $db->loadObject();
		$rand_s = 0;
		$rand_e = $tot->tot - 1;
		if($rand_e > 0) {
			$lim = rand($rand_s, $rand_e);
		}
		else {
			$lim = 0;
		}
		$db->setQuery("select `ad_code` from `#__rsbanners_ad` where `cid`='".$cid."' limit ".$lim.", 1");
		$data = $db->loadObject();
		return stripslashes($data->ad_code);
	}
}

$codeRSB = $params->get('rsb_adcode', '');

if($codeRSB != '') {
	$db =& JFactory::getDBO();
	$db->setQuery("select * from `#__rsbanners_adcat` where `status`='1' and `code`='".$codeRSB."'");
	$cat = $db->loadObject();
	$adCode = fetchAdRSB($cat->id);
	echo stripslashes($adCode);
}
?>