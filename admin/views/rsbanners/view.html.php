<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
 
/**
 * HelloWorlds View
 */
class rsbannersViewrsbanners extends JView
{
        protected $items;
        protected $pagination;
        protected $canDo;
 
        /**
         * HelloWorlds view display method
         * @return void
         */
        function display($tpl = null) 
        {
                $option = JRequest::getCmd('option');
		$mainframe = JFactory::getApplication();
		$uri = JFactory::getURI();
                // Get data from the model
                $this->items = $this->get('Items');
                $this->pagination = $this->get('Pagination');
 
                // What Access Permissions does this user have? What can (s)he do?
                $this->canDo = rsbannersHelper::getActions();
 
                // Check for errors
                if (count($errors = $this->get('Errors'))) 
                {
                        JError::raiseError(500, implode('<br />', $errors));
                        return false;
                }
 
                $this->assignRef('user',JFactory::getUser());
                $this->assignRef('request_url',$uri->toString());
                // Set the toolbar
                $this->addToolBar();
 
                // Display the template
                parent::display($tpl);
 
                // Set the document
                $this->setDocument();
        }
 
        /**
         * Setting the toolbar
         */
        protected function addToolBar() 
        {
                JToolBarHelper::title(JText::_('COM_rsbanner_MANAGER_rsbanners'), 'rsbanner');
                JToolBarHelper::addNew('rsbanner.add', 'JTOOLBAR_NEW');
                JToolBarHelper::editList('rsbanner.edit', 'JTOOLBAR_EDIT');
                JToolBarHelper::deleteList('', 'rsbanners.delete', 'JTOOLBAR_DELETE');
                /*
                if ($this->canDo->get('core.create')) 
                {
                        JToolBarHelper::addNew('rsbanner.add', 'JTOOLBAR_NEW');
                }
                if ($this->canDo->get('core.edit')) 
                {
                        JToolBarHelper::editList('rsbanner.edit', 'JTOOLBAR_EDIT');
                }
                if ($this->canDo->get('core.delete')) 
                {
                        JToolBarHelper::deleteList('', 'rsbanners.delete', 'JTOOLBAR_DELETE');
                }
                if ($this->canDo->get('core.admin')) 
                {
                        JToolBarHelper::divider();
                        JToolBarHelper::preferences('com_rsbanners');
                }
                */
        }
        /**
         * Method to set up the document properties
         *
         * @return void
         */
        protected function setDocument() 
        {
                $document = JFactory::getDocument();
                $document->setTitle(JText::_('COM_rsbanner_ADMINISTRATION'));
        }
}