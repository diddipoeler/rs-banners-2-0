<?php
/**
 * @version 1.5.0 $Id: install.rsbanners.php
 * @package Joomla 1.5.x
 * @subpackage RS-Banners
 * @copyright (C) 2009 RS Web Solutions (http://www.rswebsols.com)
 * @license GNU/GPL
 */

defined( '_JEXEC' ) or die( 'Restricted access' );

/**
 * Executes additional installation processes
 *
 * @since 0.1
 */
function com_install() {

	jimport( 'joomla.filesystem.folder' )
?>

<center>
<table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
	<tr>
		<td valign="top">
       	 	<strong>RS-Banners</strong> <font class="small">by <a href="http://www.rswebsols.com" target="_blank">RS WEB SOLUTIONS</a><br/>
        	Released under the terms and conditions of the <a href="http://www.gnu.org/licenses/gpl-2.0.html" target="_blank">GNU General Public License</a>.</font>		</td>
	</tr>
</table>

</center>
<?php
}
?>