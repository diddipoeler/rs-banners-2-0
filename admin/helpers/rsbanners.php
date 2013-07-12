<?php
// No direct access to this file
defined('_JEXEC') or die;
 
/**
 * HelloWorld component helper.
 */
abstract class rsbannersHelper
{
       
 
        /**
         * Get the actions
         */
        public static function getActions($messageId = 0)
        {       
                jimport('joomla.access.access');
                $user   = JFactory::getUser();
                $result = new JObject;
 
                if (empty($messageId)) {
                        $assetName = 'com_rsbanners';
                }
                else {
                        $assetName = 'com_rsbanners.message.'.(int) $messageId;
                }
 
                $actions = JAccess::getActions('com_rsbanners', 'component');
 
                foreach ($actions as $action) {
                        $result->set($action->name, $user->authorise($action->name, $assetName));
                }
 
                return $result;
        }
}