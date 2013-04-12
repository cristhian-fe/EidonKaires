<?php 
/*--------------------------------------------------------
# BT Sample Content Typography - Joomla! Module
# -------------------------------------------------------
# For Joomla! 2.5.x
# Copyright (C) 2012 Bonusthemes.com. All Rights Reserved.
# @license Copyrighted Commercial Software
# Website: http://www.bonusthemes.com/
# Support: support@bonusthemes.com
------------------------------------------------------- */
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// class
require_once (dirname(__FILE__).DS.'sample_content_typography.class.php');
$sample_content = new SampleContentTypography($params);
echo $sample_content->displayData();