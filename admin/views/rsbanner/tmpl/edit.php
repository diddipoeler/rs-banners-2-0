<?php 
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');

?>
<form action="<?php echo JRoute::_('index.php?option=com_rsbanners&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" >
 
<div class="col50">
<fieldset class="adminform">
	<legend><?php echo JText::_('COM_SPORTSMANAGEMENT_ADMIN_SEASON_LEGEND'); ?></legend>
	<table class="admintable">
		<tbody>
			<?php foreach ($this->form->getFieldset('details') as $field): ?>
			<tr>
				<td class="key"><?php echo $field->label; ?></td>
				<td><?php echo $field->input; ?></td>
			</tr>					
			<?php endforeach; ?>
		</tbody>
	</table>
</fieldset>
</div>			
 
	
 
	<div>
		<input type="hidden" name="task" value="rsbanner.edit" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>