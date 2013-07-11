<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
/**
 * Script file of com_sportsmanagement component
 */
class com_rsbannersInstallerScript
{
	/*
     * The release value would ideally be extracted from <version> in the manifest file,
     * but at preflight, the manifest file exists only in the uploaded temp folder.
     */
    //private $release = '1.0.00';
    
    /**
	 * method to install the component
	 *
	 * @return void
	 */
	function install($parent) 
	{
		// $parent is the class calling this method
		$parent->getParent()->setRedirectURL('index.php?option=com_rsbanners');
	}
 
	/**
	 * method to uninstall the component
	 *
	 * @return void
	 */
	function uninstall($parent) 
	{
		// $parent is the class calling this method
		echo '<p>' . JText::_('COM_SPORTSMANAGEMENT_UNINSTALL_TEXT') . '</p>';
	}
 
	/**
	 * method to update the component
	 *
	 * @return void
	 */
	function update($parent) 
	{
		// $parent is the class calling this method
		echo '<p>' . JText::_('COM_SPORTSMANAGEMENT_UPDATE_TEXT') . $parent->get('manifest')->version . '</p>';
	}
 
	/**
	 * method to run before an install/update/uninstall method
	 *
	 * @return void
	 */
	function preflight($type, $parent) 
	{
		// $parent is the class calling this method
		// $type is the type of change (install, update or discover_install)
		echo '<p>' . JText::_('COM_SPORTSMANAGEMENT_PREFLIGHT_' . $type . '_TEXT' ) . $parent->get('manifest')->version . '</p>';
	}
 
	/**
	 * method to run after an install/update/uninstall method
	 *
	 * @return void
	 */
	function postflight($type, $parent) 
	{
	$mainframe =& JFactory::getApplication();
    $db = JFactory::getDbo();
        // $parent is the class calling this method
		// $type is the type of change (install, update or discover_install)
		echo '<p>' . JText::_('COM_SPORTSMANAGEMENT_POSTFLIGHT_' . $type . '_TEXT' ) . $parent->get('manifest')->version . '</p>';


    

   
    
        
	}
    
    /*
    * sets parameter values in the component's row of the extension table
    */
    function setParams($param_array) 
    {
        
                
        }      
}
