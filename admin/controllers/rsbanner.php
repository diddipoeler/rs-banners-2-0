<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controllerform library
jimport('joomla.application.component.controllerform');
 
/**
 * HelloWorld Controller
 */
class rsbannersControllerrsbanner extends JControllerForm
{

function save()
	{
  // Check for request forgeries
		JRequest::checkToken() or die('COM_JOOMLEAGUE_GLOBAL_INVALID_TOKEN');

		$post		= JRequest::get('post');
 		$pid		= JRequest::getInt('id');
 		//$post['id'] = $pid; //map cid to table pk: id
    
    $post = JRequest::getVar('jform', array(), 'post', 'array');
		
		// decription must be fetched without striping away html code
		$post['ad_code'] = JRequest:: getVar('ad_code','none','post','STRING',JREQUEST_ALLOWHTML);

		$model = $this->getModel('rsbanner');
        
     if ($model->save($post))
		{
			$msg = JText::_('COM_JOOMLEAGUE_ADMIN_PERSON_CTRL_SAVED');
    }
    else
		{
			$msg = JText::_('COM_JOOMLEAGUE_ADMIN_PERSON_CTRL_ERROR_SAVE').$model->getError();
		}
     
     if ($this->getTask() == 'save')
		{
			$link = 'index.php?option=com_rsbanners&view=rsbanners';
		}
		else
		{
			$link = 'index.php?option=com_rsbanners&view=rsbanner&layout=edit&id='.$pid;
		}
		#echo $msg;
		$this->setRedirect($link,$msg);
           
           
     }   

}
