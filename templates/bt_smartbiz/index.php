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

$bt_helper = JPATH_BASE.DS.'templates'.DS.$this->template.DS.'helpers'.DS.'bt_helper.php';
require_once ($bt_helper);
$bt = new btTemplateHelper();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>"<?php echo ($bt->lang_type == 'RTL') ? ' dir="rtl"' : '';?>><head>
<jdoc:include type="head" />

<?php
// JS For Skin Switcher
jimport('joomla.environment.uri');
$host = JURI::root();
$document = JFactory::getDocument();
// jQuery v@1.6.4 jquery.com
$document->addScript('templates/bt_smartbiz/helpers/assets/js/jquery.min.1.6.4.js'); 
$document->addScript('templates/bt_smartbiz/helpers/assets/js/jquery.skin_switcher.noconflict.js'); 
// for css skins switcher via ajax
$document->addScript('templates/bt_smartbiz/helpers/assets/js/bt_jquery.cookie.js');
$jquery_code = "";
$jquery_code .= "\n\n";
$jquery_code .= "<!-- BEGIN: BT Skin Switcher -->\n";
$jquery_code .= "jQuery_1_6_4(function(){";

$jquery_code .= "\n\njQuery_1_6_4('#change-skin-dark_turquoise').click(function(e){
   e.preventDefault();
   jQuery_1_6_4.cookie(\"bt_cookie_skin\", null);
   jQuery_1_6_4.cookie(\"bt_cookie_skin\", \"dark_turquoise\", { });
   jQuery_1_6_4('#skin').attr('href', '".$host."templates/bt_smartbiz/css/skins/dark_turquoise".(($bt->lang_type == "RTL") ? "_rtl" : "").".css');
   }); \n"; 
$jquery_code .= "\n\njQuery_1_6_4('#change-skin-monza').click(function(e){
   e.preventDefault();
   jQuery_1_6_4.cookie(\"bt_cookie_skin\", null);
   jQuery_1_6_4.cookie(\"bt_cookie_skin\", \"monza\", { });
   jQuery_1_6_4('#skin').attr('href', '".$host."templates/bt_smartbiz/css/skins/monza".(($bt->lang_type == "RTL") ? "_rtl" : "").".css');
   }); \n"; 
$jquery_code .= "\n\njQuery_1_6_4('#change-skin-burlywood').click(function(e){
   e.preventDefault();
   jQuery_1_6_4.cookie(\"bt_cookie_skin\", null);
   jQuery_1_6_4.cookie(\"bt_cookie_skin\", \"burlywood\", { });
   jQuery_1_6_4('#skin').attr('href', '".$host."templates/bt_smartbiz/css/skins/burlywood".(($bt->lang_type == "RTL") ? "_rtl" : "").".css');
   }); \n"; 
$jquery_code .= "\n});";
$jquery_code .= "\n<!-- END: BT Skin Switcher -->";
$jquery_code .= "\n\n";
$document->addScriptDeclaration($jquery_code);
?>

<?php
// Syntax Highlighter (powered by http://alexgorbatchev.com/SyntaxHighlighter/)
if ($this->params->get("display_syntax_highlighter", "1")) :
$document->addScript('templates/'.$this->template.'/helpers/jeffects/syntax_highlighter/scripts/shCore.js');
$document->addScript('templates/'.$this->template.'/helpers/jeffects/syntax_highlighter/scripts/shBrushPhp.js');
$document->addScript('templates/'.$this->template.'/helpers/jeffects/syntax_highlighter/scripts/shBrushXml.js');
$document->addStyleSheet('templates/'.$this->template.'/helpers/jeffects/syntax_highlighter/styles/shCore.css');
$document->addStyleSheet('templates/'.$this->template.'/helpers/jeffects/syntax_highlighter/styles/shThemeDefault.css');
?>

<!-- Syntax Highlighter (powered by http://alexgorbatchev.com/SyntaxHighlighter/) -->
<script language="javascript" type="text/javascript">
SyntaxHighlighter.config.clipboardSwf = '<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/helpers/jeffects/syntax_highlighter/scripts/clipboard.swf';
SyntaxHighlighter.config.stripBrs = true;
SyntaxHighlighter.all();
</script>

<?php
endif;
?>

<?php
// NIVO SLIDER (based on: http://dev7studios.com/nivo-slider/)
if ($this->params->get("display_nivo", "1")) :
$document->addScript('templates/'.$this->template.'/helpers/jeffects/nivo/jquery.min.1.9.1.js');
$document->addScript('templates/'.$this->template.'/helpers/jeffects/nivo/jquery.nivo.slider.pack.js');
$document->addScript('templates/'.$this->template.'/helpers/jeffects/nivo/bt.jquery.nivo.slider.js');
endif;
?>

<?php
// SCROLLABLE SLIDER (based on: http://jquerytools.org/)
if ($this->params->get("display_scrollable", "1")) :
$document->addScript('templates/'.$this->template.'/helpers/jeffects/scrollable/jquery.tools.min.js');
$document->addScript('templates/'.$this->template.'/helpers/jeffects/scrollable/bt.jquery.tools.js');
endif;
?>

<!-- DEFAULT CSS-->
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/reset.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/menu/css<?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/system<?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/template<?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/joomla<?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/mstyles<?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/layout<?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/typography<?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/sliders<?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/custom<?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/general.css" type="text/css" />

<!-- VIRTUEMART CSS-->
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/virtuemart<?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />

<!-- K2 CSS-->
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/k2_style<?php echo (($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />

<!-- SKIN CSS-->
<link rel="stylesheet" id="skin" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/skins/<?php echo $bt->skin.(($bt->lang_type == "RTL") ? "_rtl" : ""); ?>.css" type="text/css" />

<?php
// Google Fonts
echo $bt->getGoogleFonts();
?>

</head>

<body>

            <div id="top_a_area">
            <?php
            if ($bt->display_logo || $bt->display_top) {
               echo $bt->getPosition("logo_top", array("logo"=>$bt->logo_width,"top"=>$bt->top_width), $bt->full_width, "horizontal", "0", "0", "0", "0", "15", "15", "15", "0");
            }
				?>
            </div>
				
            <div id="top_b_area">
            <?php
            if ($bt->display_top1 || $bt->display_top2 || $bt->display_top3 || $bt->display_top4) { 
               echo $bt->getPosition("top1_top2_top3_top4", array("top1"=>$bt->top1_width,"top2"=>$bt->top2_width,"top3"=>$bt->top3_width,"top4"=>$bt->top4_width), $bt->full_width, "horizontal", "0", "0", "0", "0", "5", "15", "0", "15");
            }
				?>
            </div>
<div class="clearfix"></div>
            <div id="toolbar_area">
            <?php
            if ($bt->display_toolbar1 || $bt->display_toolbar2 || $bt->display_menu || $bt->display_toolbar3 || $bt->display_toolbar4) { 
               echo $bt->getPosition("toolbar1_toolbar2_menu_toolbar3_toolbar4", array("toolbar1"=>$bt->toolbar1_width,"toolbar2"=>$bt->toolbar2_width,"menu"=>$bt->menu_width,"toolbar3"=>$bt->toolbar3_width,"toolbar4"=>$bt->toolbar4_width), $bt->full_width, "horizontal", "0", "0", "0", "0", "0", "0", "0", "0");
            }
				?>
            </div>

            <div id="header_a_area">
            <?php
            if ($bt->display_header1 || $bt->display_slideshow || $bt->display_header2) { 
               echo $bt->getPosition("header1_slideshow_header2", array("header1"=>$bt->header1_width,"slideshow"=>$bt->slideshow_width,"header2"=>$bt->header2_width), $bt->full_width, "horizontal", "0", "0", "0", "0", "5", "5", "5", "5");
            }
				?>
            </div>

            <div id="header_b_area">
            <?php
            if ($bt->display_header3 || $bt->display_header4 || $bt->display_header5) { 
               echo $bt->getPosition("header3_header4_header5", array("header3"=>$bt->header3_width,"header4"=>$bt->header4_width,"header5"=>$bt->header5_width), $bt->full_width, "horizontal", "0", "0", "0", "0", "15", "15", "15", "15");
            }
				?>
            </div>

            <div class="main_area">
            <div class="main_area_inner" style="width: <?php echo $bt->full_width; ?>px;">
            <div class="main">

                <?php

                if ($bt->display_left) { 
                   echo $bt->getPosition("left", array("left"=>$bt->left_width), $bt->left_width, "vertical", "0", "0", "0", "0", "15", "15", "15", "15");
                }

                ?>

                <div id="body" style="width: <?php echo $bt->bt_main_outer_width;?>px">

                      <?php

                      if ($bt->display_newsflash) { 
                         echo $bt->getPosition("newsflash", array("newsflash"=>$bt->bt_main_outer_width), $bt->bt_main_outer_width, "horizontal", "0", "0", "0", "0", "15", "15", "15", "15");
                      }

                      if ($bt->display_news1 || $bt->display_news2 || $bt->display_news3) { 
                         echo $bt->getPosition("news1_news2_news3", array("news1"=>$bt->news1_width,"news2"=>$bt->news2_width,"news3"=>$bt->news3_width), $bt->bt_main_outer_width, "horizontal", "0", "0", "0", "0", "15", "15", "15", "15");
                      }

                      if ($bt->display_pathway) { 
                         echo $bt->getPosition("pathway", array("pathway"=>$bt->bt_main_outer_width), $bt->bt_main_outer_width, "horizontal", "0", "0", "0", "0", "15", "15", "15", "15");
                      }

                      if ($bt->display_mainbody) { 
                         echo $bt->getPosition("mainbody", array("mainbody"=>$bt->bt_main_outer_width), $bt->bt_main_outer_width, "horizontal", "0", "0", "0", "0", "15", "15", "15", "15");
                      }

                      if ($bt->display_notice1 || $bt->display_notice2 || $bt->display_notice3) { 
                         echo $bt->getPosition("notice1_notice2_notice3", array("notice1"=>$bt->notice1_width,"notice2"=>$bt->notice2_width,"notice3"=>$bt->notice3_width), $bt->bt_main_outer_width, "horizontal", "0", "0", "0", "0", "15", "15", "15", "15");
                      }

                      if ($bt->display_banner) { 
                         echo $bt->getPosition("banner", array("banner"=>$bt->bt_main_outer_width), $bt->bt_main_outer_width, "horizontal", "0", "0", "0", "0", "15", "15", "15", "15");
                      }

                      ?>

                </div>

                <?php

                if ($bt->display_right) { echo $bt->getPosition("right", array("right"=>$bt->right_width), $bt->right_width, "vertical", "0", "0", "0", "0", "15", "15", "15", "15"); } 

                ?>

            </div>
            </div>
            </div>

            <div id="bottom_up_area">
            <?php
            if ($bt->display_bottomup) { 
               echo $bt->getPosition("bottomup", array("bottomup"=>$bt->bottomup_width), $bt->full_width, "horizontal", "0", "0", "0", "0", "15", "15", "15", "15");
            }
            ?>
            </div>

            <div id="bottom_down_area">
            <?php
            if ($bt->display_bottomdown) { 
               echo $bt->getPosition("bottomdown", array("bottomdown"=>$bt->bottomdown_width), $bt->full_width, "horizontal", "0", "0", "0", "0", "15", "15", "15", "15");
            }
            ?>
            </div>

            <div id="footer_a_area">
            <?php
            if ($bt->display_footer1 || $bt->display_footer2 || $bt->display_footer3 || $bt->display_footer4) { 
               echo $bt->getPosition("footer1_footer2_footer3_footer4", array("footer1"=>$bt->footer1_width,"footer2"=>$bt->footer2_width,"footer3"=>$bt->footer3_width,"footer4"=>$bt->footer4_width), $bt->full_width, "horizontal", "0", "0", "0", "0", "15", "15", "15", "15");
            }
            ?>
            </div>
      
            <!-- BEGIN: Footer -->
            <?php if ($bt->display_btlogo || $bt->copyright_message != "" || $bt->display_skin_switcher) : ?>
            <div id="footer_b_area">
               <div id="bt_footer_area" style="width: <?php echo $bt->full_width; ?>px;">
               
               <?php if ($bt->display_btlogo) : ?>
                  <div id="bt_btlogo_div">
                     <?php echo $bt->bt_btlogo; ?>
                  </div>
               <?php endif; ?>
                
               <?php if ($bt->copyright_message != "") : ?>
                  <div id="bt_copyright_message"> 
                     <?php echo $bt->copyright_message; ?>
                  </div>
               <?php endif; ?>
                
               <?php if ($bt->display_skin_switcher) : ?>
                  <div id="bt_skin_switcher">
                     <a class="change_skin_icon" id="change-skin-dark_turquoise" href="">dark_turquoise</a> 
                     <a class="change_skin_icon" id="change-skin-monza" href="">monza</a> 
                     <a class="change_skin_icon" id="change-skin-burlywood" href="">burlywood</a> 
                  </div>
               <?php endif; ?>
               
               </div>
            </div>
            <?php endif; ?>
            <!-- END: Footer -->

<?php
// BEGIN: Go top button
if ($bt->display_gotop) { echo $bt->bt_gotop; }
// END: Go top button

// BEGIN: Debug
echo $bt->getDebug();
// END: Debug
?>
</body>
</html>