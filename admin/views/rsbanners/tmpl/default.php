<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

echo $this->loadTemplate('company');
echo $this->loadTemplate('header');
echo $this->loadTemplate('rows');
echo $this->loadTemplate('footer');