<?php
/**
 * @version		$Id: default.php 21322 2011-05-11 01:10:29Z dextercowley $
 * @package		Joomla.Site
 * @subpackage	mod_login
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
JHtml::_('behavior.keepalive'); ?>

<div id="bt_popup">
	
    <div class="bt_popup_links">
    <?php if ($type == 'logout') { ?>
	    <p><a href="#bt_login_window" class="bt_login_logout" name="modal"><?php echo JText::_('JLOGOUT') ?></a></p>
	<?php }else{ ?>
	    <p><a href="#bt_login_window" class="bt_login_sign_in" name="modal"><?php echo JText::_('JLOGIN') ?></a><span>&nbsp;&nbsp;/&nbsp;&nbsp;</span><a class="bt_login_register" href="index.php?option=com_users&amp;view=registration&amp;Itemid=517"><?php echo JText::_('JREGISTER') ?></a></p>
	<?php } ?>
    </div>

	<div class="boxes">
		
        <div id="bt_login_window" class="window">
 		<div id="bt_login_window_brdr">
        
 		<a href="#" class="close bt_close"></a>	
       
        <div id="bt_login_window_inner">
        
       	<div class="bt_login_form">
        
			<?php if($type == 'logout') : ?>

            <form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="login-form">
            
				<?php if ($params->get('greeting')) : ?>
                    <div>
                    <?php if($params->get('name') == 0) : {
                        echo JText::sprintf('MOD_LOGIN_HINAME', $user->get('name'));
                    } else : {
                        echo JText::sprintf('MOD_LOGIN_HINAME', $user->get('username'));
                    } endif; ?>
                    </div>
                <?php endif; ?>
				
                <div align="center" style="margin: 20px 0 0 0;">
					<input type="submit" name="Submit" class="button" value="<?php echo JText::_('JLOGOUT'); ?>" />
                </div>
                <div class="clearfix" style="margin: 190px;"></div>
            
                <input type="hidden" name="option" value="com_users" />
                <input type="hidden" name="task" value="user.logout" />
                <input type="hidden" name="return" value="<?php echo $return; ?>" />
				<?php echo JHtml::_('form.token'); ?>
			</form>

            <?php else : ?>
            
            
            <div id="bt_login_title"><?php echo JText::_('MOD_LOGIN') ?></div>
			<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="login-form" >

				<?php if ($params->get('pretext')): ?>
                    <div class="pretext">
                    <p><?php echo $params->get('pretext'); ?></p>
                    </div>
                <?php endif; ?>

                <input id="username" type="text" name="username" class="inputbox"  size="18" />
                <div class="clearfix"></div>
                <input id="password" type="password" name="password" class="inputbox" size="18"  />
                
                <div class="clearfix"></div>
				<div class="bt_button_line">
				<?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
                <div class="bt_remember_line">
					<input id="modlgn-remember" type="checkbox" name="remember" class="inputbox" value="yes"/><label for="modlgn-remember"><?php echo JText::_('MOD_LOGIN_REMEMBER_ME') ?></label>
                </div>
				<?php endif; ?>
                <div class="bt_button_l">
                <input type="submit" name="Submit" class="button" value="<?php echo JText::_('JLOGIN') ?>" />
                </div>
                </div>
                
                <div class="bt_separator">
                	<ul class="bt_quad_list-1">
					<li><a href="<?php echo JRoute::_('index.php?option=com_users&amp;view=reset'); ?>"><?php echo JText::_('MOD_LOGIN_FORGOT_YOUR_PASSWORD'); ?></a></li>
                    <li><a href="<?php echo JRoute::_('index.php?option=com_users&amp;view=remind'); ?>"><?php echo JText::_('MOD_LOGIN_FORGOT_YOUR_USERNAME'); ?></a></li>
                        
					<?php
                    $usersConfig = JComponentHelper::getParams('com_users');
                    if ($usersConfig->get('allowUserRegistration')) : ?>
                        <li><a href="<?php echo JRoute::_('index.php?option=com_users&amp;view=registration'); ?>"><?php echo JText::_('MOD_LOGIN_REGISTER'); ?></a></li>
                    <?php endif; ?>
					</ul>
                    <?php if ($params->get('posttext')): ?>
                        <div class="posttext"><p><?php echo $params->get('posttext'); ?></p></div>
                    <?php endif; ?>
            	</div>
                
                <input type="hidden" name="option" value="com_users" />
                <input type="hidden" name="task" value="user.login" />
                <input type="hidden" name="return" value="<?php echo $return; ?>" />
                <?php echo JHtml::_('form.token'); ?>
            </form>

            <?php endif; ?>
		</div>

        </div>
        </div>
		
        </div>
		<div id="mask_login" class="mask"></div>

	</div>

</div>