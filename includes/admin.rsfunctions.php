<?php
/**
 * @version 1.5.0 $Id: admin.rsfunctions.php
 * @package Joomla 1.5.x
 * @subpackage RS-Banners
 * @copyright (C) 2009 RS Web Solutions (http://www.rswebsols.com)
 * @license GNU/GPL
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

function safePost() {
	foreach($_POST as $key=>$value) {
		if(!is_array($value)) {
			$_POST[''.$key.''] = addslashes($value);
		}
	}
}

function safeHTML($text="") {
	return htmlentities(stripslashes($text));
}

function fetchName($table, $id) {
	$db =& JFactory::getDBO();
	$db->setQuery("select `name` from `#__".RSWEBSOLS_TABLE_PREFIX."_".$table."` where `id`='".$id."'");
	$name = $db->loadObject();
	return ((trim($name->name) != '') ? trim($name->name) : '-');
}

function fetchAdCategories() {
	$db =& JFactory::getDBO();
	$db->setQuery("select * from `#__".RSWEBSOLS_TABLE_PREFIX."_adcat` where `status`='1' order by `name`");
	$data = $db->loadObjectList();
	return $data;
}
?>