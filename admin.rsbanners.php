<?php
/**
 * @version 1.5.0 $Id: admin.rsbanners.php
 * @package Joomla 1.5.x
 * @subpackage RS-Banners
 * @copyright (C) 2009 RS Web Solutions (http://www.rswebsols.com)
 * @license GNU/GPL
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', 1);

require_once('includes/admin.rssetting.php');
require_once('includes/admin.rsfunctions.php');

$task = $_REQUEST['task'];

switch($task) {
	case 'adscat':
		require_once('admin.rsadscategory.php');
		break;
	case 'ads':
		require_once('admin.rsads.php');
		break;
	case 'doc':
		require_once('admin.rsdocumentation.php');
		break;
	default:
		display_main();
		break;
}

function display_main() {
?>
<div id="element-box">
	<div class="t"><div class="t"><div class="t"></div></div></div>
	<div class="m">
	<table class="adminform"><tr><td width="70%" valign="top">
	<div id="cpanel">
		
		<div style="float:left;"><div class="icon"><a href="index.php?option=com_rsbanners&task=adscat" style="height:auto;"><img src="components/com_rsbanners/images/adcategory.png" alt="Category Management" /><span style="font-weight:bold; font-size:16px;">Category<br />Management<br /></span></a></div></div>
		
		<div style="float:left;"><div class="icon"><a href="index.php?option=com_rsbanners&task=ads" style="height:auto;"><img src="components/com_rsbanners/images/banners.jpg" alt="Banner Management" /><span style="font-weight:bold; font-size:16px;">Banner<br />Management<br /></span></a></div></div>
		
		<div style="float:left;"><div class="icon"><a href="index.php?option=com_rsbanners&task=doc" style="height:auto;"><img src="components/com_rsbanners/images/doc.gif" alt="Documentation" /><span style="font-weight:bold; font-size:16px;">Help /<br />Readme<br /></span></a></div></div>
		
	</div>
	</td><td valign="top">
	<?php include_once("components/com_rsbanners/includes/admin.rscompany.php"); ?>
	</td></tr></table>
	</div>
	<div class="b"><div class="b"><div class="b"></div></div></div>
</div>
<?php
	include_once("components/com_rsbanners/includes/admin.rsfooter.php");
}
?>