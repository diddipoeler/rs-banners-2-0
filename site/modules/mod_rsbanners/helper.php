<?php

class modrsbannersHelper
{

function getHello( $params )
    {
    $group = $params->get('rsb_adcode');
    $db = JFactory::getDBO();
    $query = 'SELECT * FROM  #__rsbanners_ad WHERE cid = '.$group;
    $db->setQuery($query);
    
    return $db->loadObjectList();
    
    }    
    
    
}    