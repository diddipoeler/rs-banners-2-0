<?php
/**
 * @copyright	Copyright (C) 2006-2013 JoomLeague.net. All rights reserved.
 * @license		GNU/GPL,see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License,and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

//jimport('joomla.application.component.modellist');
//require_once (JPATH_COMPONENT.DS.'models'.DS.'list.php');

// import the Joomla modellist library
jimport('joomla.application.component.modellist');

/**
 * Joomleague Component Seasons Model
 *
 * @package	JoomLeague
 * @since	0.1
 */
class rsbannersModelrsbanners extends JModelList
{
	var $_identifier = "rsbanners";
	
	protected function getListQuery()
	{
		$mainframe = JFactory::getApplication();
        $option = JRequest::getCmd('option');
        $search	= $mainframe->getUserStateFromRequest($option.'.'.$this->_identifier.'.search','search','','string');
        // Create a new query object.		
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		// Select some fields
		$query->select('s.*');
		// From the seasons table
		$query->from('#__rsbanners_ad as s');
        if ($search)
		{
        $query->where(self::_buildContentWhere());
        }
		$query->order(self::_buildContentOrderBy());
 
		$mainframe->enqueueMessage(JText::_('rsbanners query<br><pre>'.print_r($query,true).'</pre>'   ),'');
        return $query;
	}
	
  
  
	function _buildContentOrderBy()
	{
		$option = JRequest::getCmd('option');
		$mainframe = JFactory::getApplication();
		$filter_order		= $mainframe->getUserStateFromRequest($option.'.'.$this->_identifier.'.filter_order',		'filter_order',		's.ordering',	'cmd');
		$filter_order_Dir	= $mainframe->getUserStateFromRequest($option.'.'.$this->_identifier.'.filter_order_Dir',	'filter_order_Dir',	'',				'word');

		if ($filter_order=='s.ordering')
		{
			$orderby=' s.ordering '.$filter_order_Dir;
		}
		else
		{
			$orderby=' '.$filter_order.' '.$filter_order_Dir.',s.ordering ';
		}
		return $orderby;
	}

	function _buildContentWhere()
	{
		$option = JRequest::getCmd('option');
		$mainframe = JFactory::getApplication();

		$filter_order		= $mainframe->getUserStateFromRequest($option.'.'.$this->_identifier.'.filter_order',		'filter_order',		's.ordering',	'cmd');
		$filter_order_Dir	= $mainframe->getUserStateFromRequest($option.'.'.$this->_identifier.'.filter_order_Dir',	'filter_order_Dir',	'',				'word');
		$search				= $mainframe->getUserStateFromRequest($option.'.'.$this->_identifier.'.search',			'search',			'',				'string');
		$search=JString::strtolower($search);
		$where=array();
		if ($search)
		{
			$where[]=' LOWER(s.ad_code) LIKE '.$this->_db->Quote('%'.$search.'%');
		}
		$where=(count($where) ? '  '.implode(' AND ',$where) : ' ');
		return $where;
	}
	
	
	
	

	
}
?>