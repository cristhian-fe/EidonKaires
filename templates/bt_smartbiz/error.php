<?php
/*---------------------------------------------------------
# BT Smartbiz - Joomla! Template
# ---------------------------------------------------------
# For Joomla! 2.5
# Copyright (C) 2013 Bonusthemes.com. All rights reserved.
# @license Copyrighted Commercial Software
# Demo: http://www.bonusthemes.com/demo/?template=smartbiz
# Website: http://www.bonusthemes.com
# Support: support@bonusthemes.com
----------------------------------------------------------- */
defined( '_JEXEC' ) or die( 'Restricted access' ); 

?>

<?php defined( '_JEXEC' ) or die( 'Restricted access' );
if (!isset($this->error)) {
	$this->error = JError::raiseWarning( 403, JText::_('ALERTNOTAUTH') );
	$this->debug = false;
}
// BT Template Helper
$bt_helper = JPATH_BASE.DS.'templates'.DS.$this->template.DS.'helpers'.DS.'bt_helper.php';
require_once ($bt_helper);
$bt = new btTemplateHelper(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>"<?php echo ($bt->lang_type == 'RTL') ? ' dir="rtl"' : '';?>>
<head>

   <title><?php echo $this->error->getCode(); ?> - <?php echo $this->title; ?></title>
   <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template?>/css/reset.css" type="text/css" />
   <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template?>/css/system<?php echo ($bt->lang_type == 'RTL') ? '_rtl' : ''; ?>.css" type="text/css" />
   <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/typography<?php echo ($bt->lang_type == 'RTL') ? '_rtl' : ''; ?>.css" type="text/css" />
   <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/system/error<?php echo ($bt->lang_type == 'RTL') ? '_rtl' : ''; ?>.css" type="text/css" />
   <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/skins/<?php echo $bt->skin; ?><?php echo ($bt->lang_type == 'RTL') ? '_rtl' : ''; ?>.css" type="text/css" />

<?php
// Google Fonts
echo $bt->getGoogleFonts();
?>

</head>
<body id="bt_error">
    <div id="bt_error_outer">

        <div id="bt_error_left_col">
            <p class="error_message"><?php echo $this->error->getMessage(); ?></p> 
            <div class="error_img"></div> 
        </div>
        
        <div id="bt_error_message">
            
            <div id="bt_error_notice_text"><p><?php echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></p></div>

            <div id="bt_error_details">
                
                <ol>
                    <li><?php echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
                    <li><?php echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
                    <li><?php echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
                    <li><?php echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
                    <li><?php echo JText::_('JERROR_LAYOUT_REQUESTED_RESOURCE_WAS_NOT_FOUND'); ?></li>
                    <li><?php echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></li>
                </ol>
                
                <p><strong><?php echo JText::_('JERROR_LAYOUT_PLEASE_TRY_ONE_OF_THE_FOLLOWING_PAGES'); ?></strong></p>
                
                <ul>
                    <li><a href="<?php echo $this->baseurl; ?>/index.php" title="<?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>"><?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a></li>
                    <li><a href="<?php echo $this->baseurl; ?>/index.php?option=com_search" title="<?php echo JText::_('JERROR_LAYOUT_SEARCH_PAGE'); ?>"><?php echo JText::_('JERROR_LAYOUT_SEARCH_PAGE'); ?></a></li>
                </ul>
            
            	<p><?php echo JText::_('If difficulties persist, please contact the system administrator of this site.'); ?></p>
            
            </div>
        
        </div>
    
    </div>
    
    <div><small><?php if ($this->debug) : echo $this->renderBacktrace(); endif; ?></small></div>

</body>
</html>