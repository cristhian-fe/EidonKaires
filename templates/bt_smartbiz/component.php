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

<?php
// BT Template Helper
$bt_helper = JPATH_BASE.DS.'templates'.DS.$this->template.DS.'helpers'.DS.'bt_helper.php';
require_once ($bt_helper);
$bt = new btTemplateHelper();

$print = JRequest::getCmd('print');
$mailto = JRequest::getCmd('option');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>"<?php echo ($bt->lang_type == 'RTL') ? ' dir="rtl"' : '';?>>
<head>
	<jdoc:include type="head" />

	<!-- DEFAULTS CSS -->
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/reset.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/typography<?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/skins/<?php echo $bt->skin; ?><?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />
	
	<?php if($print == 1) : ?>   
    	<!-- PRINT CSS -->
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/system/print<?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/system/print<?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" media="Print" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/joomla<?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />
	<?php endif; ?>
    	
	<?php if($mailto == 'com_mailto') : ?>
		<!-- MAILTO CSS -->
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/system<?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/system/mailto<?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />
        
  	<?php endif; ?>
		
	<?php if(JRequest::getVar('option') == 'com_virtuemart' && (JRequest::getVar('task') == 'askquestion' || JRequest::getVar('task') == 'recommend' || JRequest::getVar('print') == 1)) : ?>
        <!-- VIRTUEMART & TYPOGRAPHY CSS -->
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/typography.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/system.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/virtuemart.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/virtuemart_popup.css" type="text/css" />
	<?php endif; ?>

<?php
// Google Fonts
echo $bt->getGoogleFonts();
?>

</head>

<?php if($print == 1) {
	$class = 'bt_print_body'; 
	$div_class = 'bt_print'; 
}else if($mailto == 'com_mailto') {
	$class = 'bt_mailto_body'; 
	$div_class = 'bt_mailto'; 
}else{
	$class = ''; 
	$div_class = ''; 
}
?>

<body class="<?php echo $class; ?>">
	
    <div class="<?php echo $div_class; ?>">
	
		<?php if($print != 1) : ?>
            <jdoc:include type="message" />
            <jdoc:include type="component" />
        <?php else : ?>
            <jdoc:include type="component" />
        <?php endif; ?>
    
    </div>

</body>
</html>