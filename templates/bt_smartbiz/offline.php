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
defined( '_JEXEC' ) or die( 'Restricted access' );

// BT Template Helper
$bt_helper = JPATH_BASE.DS.'templates'.DS.$this->template.DS.'helpers'.DS.'bt_helper.php';
require_once ($bt_helper);
$bt = new btTemplateHelper();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>"<?php echo ($bt->lang_type == 'RTL') ? ' dir="rtl"' : '';?>>
<head>
   <jdoc:include type="head" />
   <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template?>/css/reset.css" type="text/css" />
   <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template?>/css/system<?php echo ($bt->lang_type == 'RTL') ? '_rtl' : ''; ?>.css" type="text/css" />
   <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/typography<?php echo ($bt->lang_type == 'RTL') ? '_rtl' : ''; ?>.css" type="text/css" />
   <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/system/offline<?php echo ($bt->lang_type == 'RTL') ? '_rtl' : ''; ?>.css" type="text/css" />
   <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/skins/<?php echo $bt->skin; ?><?php echo ($bt->lang_type == 'RTL') ? '_rtl' : ''; ?>.css" type="text/css" />

<?php
// Google Fonts
echo $bt->getGoogleFonts();
?>

</head>
<body id="bt_offline">

    <div id="bt_offline_outer">

		<div class="bt_offline_message"><jdoc:include type="message" /></div>

		<div class="offline_img"></div> 

        <div id="bt_offline_area">

            <div id="bt_offline_form">            
                
                <div id="bt_offline_message"><?php echo $bt->app->getCfg('offline_message'); ?></div>
                
                <div id="bt_offline_form_area">
                
                    <form action="<?php echo JRoute::_('index.php', true); ?>" method="post" id="form-login">
                    
                        <div id="bt_offline_form_user">
                            <label for="username"><?php echo JText::_('JGLOBAL_USERNAME') ?></label>
                            <input name="username" id="username" type="text" class="inputbox" alt="<?php echo JText::_('JGLOBAL_USERNAME') ?>" size="18" />
                        </div>
                        
                        <div id="bt_offline_form_pass">
                            <label for="passwd"><?php echo JText::_('JGLOBAL_PASSWORD') ?></label>
                            <input type="password" name="password" class="inputbox" size="18" alt="<?php echo JText::_('JGLOBAL_PASSWORD') ?>" id="passwd" />
                        </div>
                        
                        <div class="clearfix"></div>
                        
                        <div id="bt_offline_form_remember">
                            <input type="checkbox" name="remember" class="inputbox" value="yes" alt="<?php echo JText::_('JGLOBAL_REMEMBER_ME') ?>" id="remember" />
                            <label for="remember"><?php echo JText::_('JGLOBAL_REMEMBER_ME') ?></label>
                        </div>
                        
                        <div id="bt_offline_form_button">
                            <input type="submit" name="Submit" class="button" value="<?php echo JText::_('JLOGIN') ?>" />
                        </div>
                        
                        <input type="hidden" name="option" value="com_users" />
                        <input type="hidden" name="task" value="user.login" />
                        <input type="hidden" name="return" value="<?php echo base64_encode(JURI::base()) ?>" />
                        
						<?php echo JHTML::_( 'form.token' ); ?>
                    
                    </form>
                    
                </div>
                
            </div>

        </div>
        
    </div>

</body>
</html>