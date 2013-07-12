<?php
/**
 * @version 1.5.0 $Id: admin.rsheader.php
 * @package Joomla 1.5.x
 * @subpackage RS-Banners
 * @copyright (C) 2009 RS Web Solutions (http://www.rswebsols.com)
 * @license GNU/GPL
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<div><?php include_once("components/com_rsbanners/includes/admin.rscompany_h.php"); ?></div>
<div>
	<div id="submenu-box">
		<div class="t"><div class="t"><div class="t"></div></div></div>
		<div class="m">
			<ul id="submenu">
				<li><a href="index.php?option=com_rsbanners">Home</a></li>
				<li><a href="index.php?option=com_rsbanners&task=rsbanner.adscat" <?php if($_REQUEST['task'] == 'adscat') { ?>class="active"<?php } ?>>Category Management</a></li>
				<li><a href="index.php?option=com_rsbanners&task=rsbanner.add" <?php if($_REQUEST['task'] == 'add') { ?>class="active"<?php } ?>>Banner Management</a></li>
				<li><a href="index.php?option=com_rsbanners&task=doc" <?php if($_REQUEST['task'] == 'doc') { ?>class="active"<?php } ?>>Help / Readme / Documentation</a></li>
			</ul>
			<div class="clr"></div>
		</div>
		<div class="b"><div class="b"><div class="b"></div></div></div>
	</div>
</div>