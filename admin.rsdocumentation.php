<?php
/**
 * @version 1.5.0 $Id: admin.rsdocumentation.php
 * @package Joomla 1.5.x
 * @subpackage RS-Banners
 * @copyright (C) 2009 RS Web Solutions (http://www.rswebsols.com)
 * @license GNU/GPL
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

$action = $_REQUEST['action'];

switch($action) {
	default:
		display();
}

function display() {
	include_once("components/com_rsbanners/includes/admin.rsheader.php");
	###############
?>
<div><br /></div>
<div><h1>Help / Readme / Documentation</h1></div>
<div><br /></div>
<div><strong>RSBanners</strong> is a combination of Joomla Component, Module and Plugin that works natively in Joomla 1.5.x environment. This is a very simple and user friendly banner management extension. Using this component, module and plugin you can easily able to manage and display your banners.</div>
<div><br /></div>
<div>
<p style="text-align:justify;"><strong>Component</strong> - For managing Banner Categories and Banner Advertisements in the Admin panel.</p>
<p style="text-align:justify;"><strong>Module</strong> - For displaying Banners in any position of your websites.</p>
<p style="text-align:justify;"><strong>Plugin</strong> - For displaying Banners in between Articles/Contents.</p>
<p style="text-align:justify;">This is a free extension. The features included:</p>
</div>		
<div>
<strong>Front End:</strong><br />
<ul>
<li>Display Banner anywhere in between articles.</li>
<li>If you have more than one active banner in a category, then this will display a banner by selecting randomly.</li>
<li>Using the module you can able to display banners at any place of your website.</li>
</ul>
</div>
<div>
<strong>Back End:</strong><br />
<ul>
<li>Add/Edit/Delete/Publish/Unpublish Banner Categories.</li>
<li>Add/Edit/Delete/Publish/Unpublish Banners.</li>
<li>Documentation.</li>
</ul>
</div>
<div>
<strong>How To Use the Component (Steps):</strong>
<br />
<ol>
<li>Install the Component.</li>
<li>Under Component you can find 2 sections, <strong>Category Management</strong> and <strong>Banner Management</strong>.</li>
<li>By default you can find under <strong>Category Management</strong> all "Google Adsense Categories" are added for your simplicity. However you can add/edit/delete/publish/unpublish any category you want.</li>
<li>There are 2 fields in <strong>Category Management</strong>. One is <strong>Category Name</strong> and another is <strong>Category Access Code</strong>.</li>
<li><strong>Category Name</strong> is the name of the category. This will help you to identify the category. Here the category is mainly used to identify the banners width and height.</li>
<li><strong>Category Access Code</strong> is the code that you need to put in your article description to display the banner under this category. If you have more than one active banner in this category then the script will randomly choose one banner and display. In time of adding this Access Code please try to use uncommon and unique format like: {BANNER_120X600} or [120X600_BAN] etc.</li>
<li>Under <strong>Banner Management</strong> you can simply able to add your banners by selecting a <strong>Banner Category</strong> and placing your <strong>Banner Code</strong>.</li>
</ol>
</div>
<div>
<strong>How To Use the Plugin (Steps):</strong>
<br />
<ol>
<li>Install the Plugin.</li>
<li>To display banners in your content page you just need to activate the Plugin first by going to "Extensions" => "Plugin Manager".</li>
<li>Then go to your articles and place the proper "Category Access Codes" in each place where you wish to display the banners.</li>
</ol>
</div>
<a name="support"></a>
<div>
<strong>How To Use the Module (Steps):</strong>
<br />
<ol>
<li>Install the module.</li>
<li>Go to Module Manager and add your RSBanners module. Assign the "Access Code of the Banner Category" in the module parameter.</li>
</ol>
</div>
<?php
	###############	
	include_once("components/com_rsbanners/includes/admin.rsfooter.php");
}
?>