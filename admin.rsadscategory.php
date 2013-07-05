<?php
/**
 * @version 1.5.0 $Id: admin.rsadscategory.php
 * @package Joomla 1.5.x
 * @subpackage RS-Banners
 * @copyright (C) 2009 RS Web Solutions (http://www.rswebsols.com)
 * @license GNU/GPL
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

$action = $_REQUEST['action'];

switch($action) {
	case 'add':
	case 'edit':
		add_edit();
		break;
	case 'save':
		save();
		break;
	case 'publish':
	case 'unpublish':
		publish_unpublish();
		break;
	case 'delete':
		delete();
		break;
	default:
		display();
}

function display() {
	include_once("components/com_rsbanners/includes/admin.rsheader.php");
	###############
	global $mainframe;
	$limit1 = 0;
	$limit2 = 0;
	$pa = 0;
	if($_REQUEST['limit'] > 0) {
		$limit2 = $_REQUEST['limit'];
	}
	else {
		$limit2 = $mainframe->getCfg('list_limit');
	}
	if($_REQUEST['page'] > 0) {
		$pa = $_REQUEST['page'];
	}
	else {
		$pa = 1;
	}
	$limit1 = $limit2 * ($pa-1);
	$database =& JFactory::getDBO();
	
	$database->setQuery("select count(*) as tot from `#__".RSWEBSOLS_TABLE_PREFIX."_adcat` where 1");
	$cnt = $database->loadObject();
	$total_page = ceil($cnt->tot/$limit2);
	
	$database->setQuery("select * from `#__".RSWEBSOLS_TABLE_PREFIX."_adcat` where 1 order by name limit ".$limit1.",".$limit2."");
	$items = $database->loadObjectList();
?>
<div>
<div>&nbsp;</div>
<table width="100%" cellpadding="0" cellspacing="0"><tr><td><h1>Manage Ad/Banner Categories</h1></td><td align="right"><a href="index.php?option=<?php echo $_REQUEST['option']; ?>&task=<?php echo $_REQUEST['task']; ?>&action=add&page=<?php echo $_REQUEST['page']; ?>&limit=<?php echo $_REQUEST['limit']; ?>" title="Add New Item"><img src="images/new_f2.png" border="0" alt="Edit" /></a></td></tr></table>
<div>&nbsp;</div>
</div>
<div id="editcell">
	<table class="adminlist">
	<thead>
		<tr>
			<th>#</th>
			<th class="title" style="text-align:left;">Category Name</th>
			<th class="title" style="text-align:left;">Category Access Code</th>
			<th nowrap="nowrap">Published</th>
			<th nowrap="nowrap">ID</th>
			<th class="title">Edit</th>
			<th class="title">Delete</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="9">
				<script type="text/JavaScript">
				<!--
				function MM_jumpMenu(targ,selObj,restore){ //v3.0
				  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
				  if (restore) selObj.selectedIndex=0;
				}
				//-->
				</script>
				<del class="container"><div class="pagination">

<div class="limit">Display #:
<select name="limit" id="limit" class="inputbox" size="1" onchange="MM_jumpMenu('parent',this,0)">
	<option value="index.php?option=<?php echo $_REQUEST['option'] ?>&task=<?php echo $_REQUEST['task'] ?>&page=1&limit=5" <?php if ($limit2 == '5') : ?>selected="selected"<?php endif; ?>>5</option>
	<option value="index.php?option=<?php echo $_REQUEST['option'] ?>&task=<?php echo $_REQUEST['task'] ?>&page=1&limit=10" <?php if ($limit2 == '10') : ?>selected="selected"<?php endif; ?>>10</option>
	<option value="index.php?option=<?php echo $_REQUEST['option'] ?>&task=<?php echo $_REQUEST['task'] ?>&page=1&limit=15" <?php if ($limit2 == '15') : ?>selected="selected"<?php endif; ?>>15</option>
	<option value="index.php?option=<?php echo $_REQUEST['option'] ?>&task=<?php echo $_REQUEST['task'] ?>&page=1&limit=20" <?php if ($limit2 == '20') : ?>selected="selected"<?php endif; ?>>20</option>
	<option value="index.php?option=<?php echo $_REQUEST['option'] ?>&task=<?php echo $_REQUEST['task'] ?>&page=1&limit=25" <?php if ($limit2 == '25') : ?>selected="selected"<?php endif; ?>>25</option>
	<option value="index.php?option=<?php echo $_REQUEST['option'] ?>&task=<?php echo $_REQUEST['task'] ?>&page=1&limit=30" <?php if ($limit2 == '30') : ?>selected="selected"<?php endif; ?>>30</option>
	<option value="index.php?option=<?php echo $_REQUEST['option'] ?>&task=<?php echo $_REQUEST['task'] ?>&page=1&limit=50" <?php if ($limit2 == '50') : ?>selected="selected"<?php endif; ?>>50</option>
	<option value="index.php?option=<?php echo $_REQUEST['option'] ?>&task=<?php echo $_REQUEST['task'] ?>&page=1&limit=100" <?php if ($limit2 == '100') : ?>selected="selected"<?php endif; ?>>100</option>
	<option value="index.php?option=<?php echo $_REQUEST['option'] ?>&task=<?php echo $_REQUEST['task'] ?>&page=1&limit=999999" <?php if ($limit2 == '999999') : ?>selected="selected"<?php endif; ?>>all</option>
</select> | Page:
<select name="page" id="page" class="inputbox" size="1" onchange="MM_jumpMenu('parent',this,0)">
	<?php for($i=1;$i<=$total_page;$i++) { ?>
	<option value="index.php?option=<?php echo $_REQUEST['option'] ?>&task=<?php echo $_REQUEST['task'] ?>&page=<?php echo $i; ?>&limit=<?php echo $limit2; ?>" <?php if ($i == $pa) : ?>selected="selected"<?php endif; ?>><?php echo $i; ?></option>
	<?php } ?>
</select>
</div>
</div></del>			</td>
		</tr>
	</tfoot>
		<tbody>
			<?php
			$cnt = 1;
			foreach ($items as $item) {
			
			?>
			<tr class="row<?php echo ($cnt%2); ?>">
				<td align="center"><?php echo $cnt; ?></td>
				<td><a href="index.php?option=<?php echo $_REQUEST['option']; ?>&task=<?php echo $_REQUEST['task']; ?>&action=edit&id=<?php echo $item->id; ?>&page=<?php echo $_REQUEST['page']; ?>&limit=<?php echo $_REQUEST['limit']; ?>" title="Edit Item"><?php echo $item->name; ?></a></td>
				<td><?php echo $item->code; ?></td>
				<td align="center">
				<?php if($item->status == 1) { ?>
				<a href="index.php?option=<?php echo $_REQUEST['option']; ?>&task=<?php echo $_REQUEST['task']; ?>&action=unpublish&id=<?php echo $item->id; ?>&page=<?php echo $_REQUEST['page']; ?>&limit=<?php echo $_REQUEST['limit']; ?>" title="Unpublish Item"><img src="images/tick.png" border="0" alt="Published" /></a>
				<?php } else { ?>
				<a href="index.php?option=<?php echo $_REQUEST['option']; ?>&task=<?php echo $_REQUEST['task']; ?>&action=publish&id=<?php echo $item->id; ?>&page=<?php echo $_REQUEST['page']; ?>&limit=<?php echo $_REQUEST['limit']; ?>" title="Publish Item"><img src="images/publish_x.png" border="0" alt="Unpublished" /></a>
				<?php } ?>
				</td>
				<td align="center"><?php echo $item->id; ?></td>
				<td align="center"><a href="index.php?option=<?php echo $_REQUEST['option']; ?>&task=<?php echo $_REQUEST['task']; ?>&action=edit&id=<?php echo $item->id; ?>&page=<?php echo $_REQUEST['page']; ?>&limit=<?php echo $_REQUEST['limit']; ?>" title="Edit Item"><img src="images/edit_f2.png" border="0" alt="Edit" /></a></td>
				<td align="center"><a href="index.php?option=<?php echo $_REQUEST['option']; ?>&task=<?php echo $_REQUEST['task']; ?>&action=delete&id=<?php echo $item->id; ?>&page=<?php echo $_REQUEST['page']; ?>&limit=<?php echo $_REQUEST['limit']; ?>" title="Delete Item" onclick="javascript:if(confirm('Delete #<?php echo $item->id; ?>. Are you sure?')){return true;}else{return false;}"><img src="images/delete_f2.png" border="0" alt="Delete" /></a></td>
			</tr>
			<?php
				$cnt++;
			}
			if($cnt == 1) {
			?>
			<tr><td colspan="9">No Item Found.</td></tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>
<?php
	###############	
	include_once("components/com_rsbanners/includes/admin.rsfooter.php");
}

function add_edit() {
	include_once("components/com_rsbanners/includes/admin.rsheader.php");
	$id = ($_REQUEST['id'] >0) ? $_REQUEST['id'] : 0;
	if($_REQUEST['action'] == 'edit') {
		$database =& JFactory::getDBO();
		$database->setQuery("select * from `#__".RSWEBSOLS_TABLE_PREFIX."_adcat` where `id`='".$_REQUEST['id']."'");
		$row = $database->loadObject();
	}
	###############
?>
<div>
<div>&nbsp;</div>
<div><h1><?php echo ucfirst(strtolower($_REQUEST['action'])); ?> Ad/Banner Category</h1></div>
<div>&nbsp;</div>
</div>
<fieldset class="adminform">
				<legend>Details</legend>
				<script type="text/javascript">
				function submitFormRS() {
					var f = document.adminFormRS;
					if(f.cname.value == '') {
						alert("Please enter name.");
						f.cname.focus();
						return false;
					}
					else if(f.code.value == '') {
						alert("Please enter access code.");
						f.code.focus();
						return false;
					}
					else {
						return true;
					}
				}
				
				function cancelFormRS() {
					window.location.href="index.php?option=<?php echo $_REQUEST['option']; ?>&task=<?php echo $_REQUEST['task']; ?>&page=<?php echo $_REQUEST['page']; ?>&limit=<?php echo $_REQUEST['limit']; ?>";
				}
				</script>
				<form action="index.php" method="post" name="adminFormRS" id="adminFormRS" onsubmit="return submitFormRS();">
				<input type="hidden" name="option" id="option" value="<?php echo $_REQUEST['option']; ?>" />
				<input type="hidden" name="task" id="task" value="<?php echo $_REQUEST['task']; ?>" />
				<input type="hidden" name="action" id="action" value="save" />
				<input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
				<input type="hidden" name="page" id="page" value="<?php echo $_REQUEST['page']; ?>" />
				<input type="hidden" name="limit" id="limit" value="<?php echo $_REQUEST['limit']; ?>" />
					<table class="admintable">
					<tr>
						<td class="key">Name:</td>
						<td colspan="2">
						<input class="text_area" type="text" name="cname" id="cname" value="<?php echo $row->name; ?>" size="50" maxlength="50" />
						</td>
					</tr>
					<tr>
						<td class="key">Access Code:</td>
						<td colspan="2">
						<input class="text_area" type="text" name="code" id="code" value="<?php echo $row->code; ?>" size="50" maxlength="50" />
						</td>
					</tr>
					<tr>
						<td width="120" class="key">Published:</td>
						<td>
						<input type="radio" name="published" id="published0" value="0" class="inputbox" <?php if(($_REQUEST['action']=='edit')&&($row->status=='0')) { ?>checked="checked"<?php } ?> /><label for="published0">No</label><input type="radio" name="published" id="published1" value="1"  <?php if($_REQUEST['action']=='add') {?>checked="checked"<?php } elseif(($_REQUEST['action']=='edit')&&($row->status=='1')) { ?>checked="checked"<?php } else {} ?> class="inputbox" /><label for="published1">Yes</label>
						</td>					</tr>
					<tr>
						<td class="key">&nbsp;</td>
						<td><input type="submit" name="submit" value="Submit" class="button" /> <input type="button" name="cancel" value="Cancel" class="button" onclick="return cancelFormRS();" /></td>
					</tr>
				</table>
				</form>
</fieldset>
<?php
	###############
	include_once("components/com_rsbanners/includes/admin.rsfooter.php");
}

function save() {
	$database =& JFactory::getDBO();
	if($_POST['id']>0) {
		$database->setQuery("update `#__".RSWEBSOLS_TABLE_PREFIX."_adcat` set `name`='".$_POST['cname']."', `code`='".$_POST['code']."', `status`='".$_POST['published']."' where `id`='".$_POST['id']."'");
	}
	else {
		$database->setQuery("insert into `#__".RSWEBSOLS_TABLE_PREFIX."_adcat`(`id`, `name`, `code`, `status`) values('', '".$_POST['cname']."', '".$_POST['code']."', '".$_POST['published']."')");
	}
	$database->query();
	header("location:index.php?option=".$_REQUEST['option']."&task=".$_REQUEST['task']."&page=".$_REQUEST['page']."&limit=".$_REQUEST['limit']."&result=true");
	exit();
}

function publish_unpublish() {
	$database =& JFactory::getDBO();
	$database->setQuery("update `#__".RSWEBSOLS_TABLE_PREFIX."_adcat` set `status`=if((`status` > 0), 0, 1) where `id`='".$_REQUEST['id']."'");
	$database->query();
	header("location:index.php?option=".$_REQUEST['option']."&task=".$_REQUEST['task']."&page=".$_REQUEST['page']."&limit=".$_REQUEST['limit']."&result=true");
	exit();
}

function delete() {
	$database =& JFactory::getDBO();
	$database->setQuery("delete from `#__".RSWEBSOLS_TABLE_PREFIX."_adcat` where `id`='".$_REQUEST['id']."'");
	$database->query();
	header("location:index.php?option=".$_REQUEST['option']."&task=".$_REQUEST['task']."&page=".$_REQUEST['page']."&limit=".$_REQUEST['limit']."&result=true");
	exit();
}
?>