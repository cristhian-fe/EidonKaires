<?php
/*---------------------------------------------------------
# BT - Joomla! Template
# ---------------------------------------------------------
# For Joomla! 2.5
# Copyright (C) 2012 Bonusthemes.com. All rights reserved.
# @license Copyrighted Commercial Software
# Website: http://www.bonusthemes.com
# Support: support@bonusthemes.com
----------------------------------------------------------- */

defined( '_JEXEC' ) or die( 'Restricted access' ); 

function modChrome_BTxhtml($module, &$params, &$attribs)
{
	$mod_suffix = $params->get('moduleclass_sfx');
	
    // Add span to module title
	$title = $module->title;
	$pos = strpos($title, ' ');
	if ($pos) { 
		$title = "<span class=\"first-word\">" . substr($title, 0, $pos+1) . "</span>" . substr($title, $pos+1);
	}else{ 
		$title = "<span class=\"first-word\">" . $title . "</span>";
	}
?>	
	<?php 
	if ($mod_suffix == '_btmstyle_icon_new_a') : ?>
	
    	<div class="moduletable<?php echo $mod_suffix; ?>"<?php echo $left_box_width; ?>>
        <div class="btmstyle_icon btmstyle_icon_new_a">
            <div class="btmstyle_icon_img btmstyle_icon_img_new_a"></div>
            <div class="btmstyle_icon_inner btmstyle_icon_inner_new_a">
                <?php if ($module->showtitle != 0) { ?>
                        <h3 class="btmstyle_icon_h3"><div><span class="icon">&nbsp;</span><span class="title_arrow"><?php echo $title; ?></span><span class="arrow">&nbsp;</span></div></h3>
                    <?php }else{ ?>
                        <h3 class="btmstyle_icon_h3"><div><span class="title_arrow">Module Title</span><span class="arrow">&nbsp;</span></div></h3>
                <?php } ?>
                <div class="btmstyle_icon_text">
                    <?php echo $module->content; ?>
                </div>
            </div>
        </div>
        </div>
    
	<?php
	elseif ($mod_suffix == '_btmstyle_icon_new_b') :
	?>
    
		<div class="moduletable<?php echo $mod_suffix; ?>"<?php echo $left_box_width; ?>>
        <div class="btmstyle_icon btmstyle_icon_new_b">
            <div class="btmstyle_icon_img btmstyle_icon_img_new_b"></div>
            <div class="btmstyle_icon_inner btmstyle_icon_inner_new_b">
                <?php if ($module->showtitle != 0) { ?>
                        <h3 class="btmstyle_icon_h3"><div><span class="title_arrow"><?php echo $title; ?></span><span class="arrow">&nbsp;</span></div></h3>
                    <?php }else{ ?>
                        <h3 class="btmstyle_icon_h3"><div><span class="title_arrow">Module Title</span><span class="arrow">&nbsp;</span></div></h3>
                <?php } ?>
                <div class="btmstyle_icon_text">
                    <?php echo $module->content; ?>
                </div>
            </div>
        </div>
        </div>
	
	<?php
	else:
	?>
    
        <div class="moduletable<?php echo $mod_suffix; ?>">
        	<div class="icon_a" style="display:none">&nbsp;</div>
            <?php if ($module->showtitle != 0) { ?>
                <h3 class="bt"><span class="btmstyle"><span class="title_arrow"><?php echo $title; ?></span><span class="arrow">&nbsp;</span></span></h3>
            <?php 
            }
                echo '<div class="module_content"><div>'.$module->content.'</div></div>';
            ?>
        	<div class="icon_b" style="display:none">&nbsp;</div>
        </div>
    
    <?php endif; ?>
    
<?php 
}//endf