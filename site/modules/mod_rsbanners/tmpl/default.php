<?php
defined('_JEXEC') or die('Restricted access');

echo 'banner <pre>',print_r($banners, true),'</pre>';

foreach ( $banners as $row )
{
echo $row->ad_code; 
$document->addScript($row->ad_code);  
}

?>