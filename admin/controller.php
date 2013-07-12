<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controller library
jimport('joomla.application.component.controller');
 
/**
 * General Controller of HelloWorld component
 */
class rsbannersController extends JController
{
        /**
         * display task
         *
         * @return void
         */
        public function display($cachable = false, $urlparams = false)
        {
                // set default view if not set
                $input = JFactory::getApplication()->input;
                $input->set('view', $input->getCmd('view', 'rsbanners'));
 
                // call parent behavior
                parent::display($cachable, $urlparams);
 
                // Set the submenu
                //HelloWorldHelper::addSubmenu('messages');
        }
}