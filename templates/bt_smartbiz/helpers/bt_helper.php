<?php
/*---------------------------------------------------------
# BT Smartbiz v1.0.0 - Joomla! Template
# ---------------------------------------------------------
# For Joomla! 2.5
# Copyright (C) 2013 Bonusthemes.com. All rights reserved.
# @license Copyrighted Commercial Software
# Demo: http://www.bonusthemes.com/demo/?template=smartbiz
# Website: http://www.bonusthemes.com
# Support: support@bonusthemes.com
----------------------------------------------------------- */
defined( '_JEXEC' ) or die( 'Restricted access' ); 

error_reporting(0);
class btTemplateHelper {

  // DISPLAY (enable=1, disable=0)
  var $display_logo = "";
  var $display_top = "";
  var $display_top1 = "";
  var $display_top2 = "";
  var $display_top3 = "";
  var $display_top4 = "";
  var $display_toolbar1 = "";
  var $display_toolbar2 = "";
  var $display_menu = "";
  var $display_toolbar3 = "";
  var $display_toolbar4 = "";
  var $display_header1 = "";
  var $display_slideshow = "";
  var $display_header2 = "";
  var $display_header3 = "";
  var $display_header4 = "";
  var $display_header5 = "";
  var $display_left = "";
  var $display_newsflash = "";
  var $display_news1 = "";
  var $display_news2 = "";
  var $display_news3 = "";
  var $display_pathway = "";
  var $display_notice1 = "";
  var $display_notice2 = "";
  var $display_notice3 = "";
  var $display_banner = "";
  var $display_right = "";
  var $display_bottomup = "";
  var $display_bottomdown = "";
  var $display_footer1 = "";
  var $display_footer2 = "";
  var $display_footer3 = "";
  var $display_footer4 = "";

  // go top
  var $display_gotop = "";

  // bt logo
  var $display_btlogo = "";

  // skin switcher
  var $display_skin_switcher = "";

  // copyright message
  var $copyright_message = "";

  // mainbody on frontpage
  var $display_mainbody_on_frontpage = "";

  // language type (LTR, RTL)
  var $lang_type = "";

  // WIDTHS
  var $full_width = 0;
  var $left = 0;
  var $right = 0;
  var $left_main_right = 0;
  var $main = 0;

  // MODULE WIDTHS
  var $logo_width = "";
  var $top_width = "";
  var $top1_width = "";
  var $top2_width = "";
  var $top3_width = "";
  var $top4_width = "";
  var $toolbar1_width = "";
  var $toolbar2_width = "";
  var $menu_width = "";
  var $toolbar3_width = "";
  var $toolbar4_width = "";
  var $header1_width = "";
  var $slideshow_width = "";
  var $header2_width = "";
  var $header3_width = "";
  var $header4_width = "";
  var $header5_width = "";
  var $left_width = "";
  var $newsflash_width = "";
  var $news1_width = "";
  var $news2_width = "";
  var $news3_width = "";
  var $pathway_width = "";
  var $notice1_width = "";
  var $notice2_width = "";
  var $notice3_width = "";
  var $banner_width = "";
  var $right_width = "";
  var $bottomup_width = "";
  var $bottomdown_width = "";
  var $footer1_width = "";
  var $footer2_width = "";
  var $footer3_width = "";
  var $footer4_width = "";

  // MODULES
  var $bt_logo = "";
  var $bt_top = "";
  var $bt_top1 = "";
  var $bt_top2 = "";
  var $bt_top3 = "";
  var $bt_top4 = "";
  var $bt_toolbar1 = "";
  var $bt_toolbar2 = "";
  var $bt_menu = "";
  var $bt_toolbar3 = "";
  var $bt_toolbar4 = "";
  var $bt_header1 = "";
  var $bt_slideshow = "";
  var $bt_header2 = "";
  var $bt_header3 = "";
  var $bt_header4 = "";
  var $bt_header5 = "";
  var $bt_left = "";
  var $bt_newsflash = "";
  var $bt_news1 = "";
  var $bt_news2 = "";
  var $bt_news3 = "";
  var $bt_pathway = "";
  var $bt_notice1 = "";
  var $bt_notice2 = "";
  var $bt_notice3 = "";
  var $bt_banner = "";
  var $bt_right = "";
  var $bt_bottomup = "";
  var $bt_bottomdown = "";
  var $bt_footer1 = "";
  var $bt_footer2 = "";
  var $bt_footer3 = "";
  var $bt_footer4 = "";

  // go top
  var $bt_gotop = "";

  // template variables
  var $host = "";
  var $app = "";
  var $document = "";
  var $template_name = "";
  var $tmpl_params = "";
  var $skin = "";
  var $menu = "";

  // other helper variables
  var $margin = "";
  var $padding = "";

  // cookie
  var $bt_cookie_menu = "";
  var $bt_sidebar_width_height = "";
  var $bt_theadings = "";
  var $bt_fr = "";

  function __construct() {
    // get jimport
    jimport( 'joomla.application.module.helper' );
    jimport( 'joomla.filesystem.file' );
    jimport( 'joomla.environment.uri' );

    // default vars
    $this->host = JURI::root();
    $this->app = JFactory::getApplication();
    $this->document = JFactory::getDocument();
    $this->template_name = $this->app->getTemplate();
    $this->god();
    $this->pl();

    // get template params
    $this->tmpl_params = $this->app->getTemplate(true)->params;

    // get current skin (from template parameters)
    $this->skin = $this->tmpl_params->get('skin');

    // set skin via cookies
    $this->setSkin();

    // get current menu (from template parameters)
    if (JRequest::getVar("skin") != "") {
      $this->skin = JRequest::getVar("skin");
    }else if (isset($_COOKIE["bt_cookie_skin"])){
      $this->skin = $_COOKIE["bt_cookie_skin"];
    }else{
      $this->skin = $this->tmpl_params->get("skin");
    }

    // set menu via cookies
    $this->setMenu();

    // get current menu (from template parameters)
    if (JRequest::getVar("menu") != "") {
      $this->menu = JRequest::getVar("menu");
    }else if (isset($_COOKIE["bt_cookie_menu"])){
      $this->menu = $_COOKIE["bt_cookie_menu"];
    }else{
      $this->menu = $this->tmpl_params->get("menu");
    }

    // get current tlayout (from template parameters)
    if (JRequest::getVar("tlayout") != "") {
      $this->tlayout = JRequest::getVar("tlayout");
    }else{
      $this->tlayout = $this->tmpl_params->get("tlayout");
    }

    // get template layout params
    $this->display_mainbody_on_frontpage = $this->tmpl_params->get("display_mainbody_on_frontpage", "1");

    // get copyright message
    $this->copyright_message = $this->tmpl_params->get("copyright_message", "Copyright &copy; 2012 Joomla! template by BonusThemes.com. All Rights Reserved.<br /><a href=\"http://www.joomla.org\" target=\"_blank\">Joomla!</a> is Free Software released under the <a href=\"http://www.gnu.org/licenses/gpl-2.0.html\" target=\"_blank\">GNU General Public License</a>.");

    // set the language type (LTR, RTL)
    $this->setLangType();

    // get the current language type (LTR, RTL)
    if (JRequest::getVar("lang_type") != "") {
      $this->lang_type = JRequest::getVar("lang_type");
    }else if (isset($_COOKIE["bt_cookie_lang_type"])){
      $this->lang_type = $_COOKIE["bt_cookie_lang_type"];
    }else{
      $this->lang_type = $this->tmpl_params->get("lang_type");
    }

    // call js files
    $this->getJSFiles();

    // call css files
    //$this->getCSSFiles();

    // call config function
    $this->getConfig();

    // call modules function
    $this->getModules();

  }

  // Set menu via cookies (for quickstart templates)
  function setMenu() {
    if (JRequest::getVar("menu") != "") {
      setcookie("bt_cookie_menu", JRequest::getVar("menu"), time()+3600);
      return true;
    }
    return false;
  }

  // Set language type (LTR, RTL) via cookies
  function setLangType() {
    if (JRequest::getVar("lang_type") != "") {
      setcookie("bt_cookie_lang_type", JRequest::getVar("lang_type"), time()+3600);
      return true;
    }
    return false;
  }

  // Set skin via cookies (for quickstart templates)
  function setSkin() {
    if (JRequest::getVar("skin") != "") {
      setcookie("bt_cookie_skin", JRequest::getVar("skin"), time()+3600);
      return true;
    }
    return false;
  }

  // Check if modules are enabled, and return 1, or return 0 if is disabled
  function getConfig() {

    // modules
    $this->display_logo = count(JModuleHelper::getModules("logo"));
    $this->display_top = count(JModuleHelper::getModules("top"));
    $this->display_top1 = count(JModuleHelper::getModules("top1"));
    $this->display_top2 = count(JModuleHelper::getModules("top2"));
    $this->display_top3 = count(JModuleHelper::getModules("top3"));
    $this->display_top4 = count(JModuleHelper::getModules("top4"));
    $this->display_toolbar1 = count(JModuleHelper::getModules("toolbar1"));
    $this->display_toolbar2 = count(JModuleHelper::getModules("toolbar2"));
    $this->display_menu = count(JModuleHelper::getModules("menu"));
    $this->display_toolbar3 = count(JModuleHelper::getModules("toolbar3"));
    $this->display_toolbar4 = count(JModuleHelper::getModules("toolbar4"));
    $this->display_header1 = count(JModuleHelper::getModules("header1"));
    $this->display_slideshow = count(JModuleHelper::getModules("slideshow"));
    $this->display_header2 = count(JModuleHelper::getModules("header2"));
    $this->display_header3 = count(JModuleHelper::getModules("header3"));
    $this->display_header4 = count(JModuleHelper::getModules("header4"));
    $this->display_header5 = count(JModuleHelper::getModules("header5"));
    $this->display_left = count(JModuleHelper::getModules("left"));
    $this->display_newsflash = count(JModuleHelper::getModules("newsflash"));
    $this->display_news1 = count(JModuleHelper::getModules("news1"));
    $this->display_news2 = count(JModuleHelper::getModules("news2"));
    $this->display_news3 = count(JModuleHelper::getModules("news3"));
    $this->display_pathway = count(JModuleHelper::getModules("pathway"));
    $this->display_notice1 = count(JModuleHelper::getModules("notice1"));
    $this->display_notice2 = count(JModuleHelper::getModules("notice2"));
    $this->display_notice3 = count(JModuleHelper::getModules("notice3"));
    $this->display_banner = count(JModuleHelper::getModules("banner"));
    $this->display_right = count(JModuleHelper::getModules("right"));
    $this->display_bottomup = count(JModuleHelper::getModules("bottomup"));
    $this->display_bottomdown = count(JModuleHelper::getModules("bottomdown"));
    $this->display_footer1 = count(JModuleHelper::getModules("footer1"));
    $this->display_footer2 = count(JModuleHelper::getModules("footer2"));
    $this->display_footer3 = count(JModuleHelper::getModules("footer3"));
    $this->display_footer4 = count(JModuleHelper::getModules("footer4"));

    // TEMPLATE LAYOUT
    switch ($this->tlayout) {
      case "left":
        $this->left = 1;
      break;
      case "right":
        $this->right = 1;
      break;
      case "left_main_right":
        $this->left_main_right = 1;
      break;
      case "main":
        $this->main = 1;
      break;
    }

    // Only Main (without left column)
    if ($this->main) {
      $this->display_left = 0;
      $this->display_right = 0;
    }

    // Only Left Column
    if ($this->left) {
      $this->display_left = ($this->display_left) ? 1 : 0;
      $this->display_right = 0;
    }

    // Only Right Column
    if ($this->right) {
      $this->display_left = 0;
      $this->display_right = ($this->display_right) ? 1 : 0;
    }

    // Left + Main + Right
    if ($this->left_main_right) {
      $this->display_left = ($this->display_left) ? 1 : 0;
      $this->display_right = ($this->display_right) ? 1 : 0;
    }

    // display mainbody on frontpage
    $this->display_mainbody = ($this->display_mainbody_on_frontpage == 0 && JRequest::getVar("view") == "featured" && JRequest::getVar("Itemid") == 101) ? false : true;

    // go top
    $this->display_gotop = $this->tmpl_params->get("display_gotop", "1");

    // bt logo
    $this->display_btlogo = $this->tmpl_params->get("display_btlogo", "1");

    // bt skin switcher
    $this->display_skin_switcher = $this->tmpl_params->get("display_skin_switcher", "1");

    // WIDTHS
    $prefix = "px";

    // FULL
    $this->full_width = $this->tmpl_params->get("full_width");

    // LEFT
    $this->left_width = $this->tmpl_params->get("left_width"); // ex. 300

    // RIGHT
    $this->right_width = $this->tmpl_params->get("right_width"); // ex. 300

    // MAIN
    // calculate widths
    $this->left_width = ($this->display_left) ? $this->left_width : 0;
    $this->right_width = ($this->display_right) ? $this->right_width : 0;

    // TOTAL
    $this->bt_main_outer_width = ($this->full_width - ($this->left_width + $this->right_width) );  // is from the destination of left / right column

    // modules widths
    $this->logo_width = (int)$this->tmpl_params->get("logo_width");
    $this->top_width = (int)$this->tmpl_params->get("top_width");
    $this->top1_width = (int)$this->tmpl_params->get("top1_width");
    $this->top2_width = (int)$this->tmpl_params->get("top2_width");
    $this->top3_width = (int)$this->tmpl_params->get("top3_width");
    $this->top4_width = (int)$this->tmpl_params->get("top4_width");
    $this->toolbar1_width = (int)$this->tmpl_params->get("toolbar1_width");
    $this->toolbar2_width = (int)$this->tmpl_params->get("toolbar2_width");
    $this->menu_width = (int)$this->tmpl_params->get("menu_width");
    $this->toolbar3_width = (int)$this->tmpl_params->get("toolbar3_width");
    $this->toolbar4_width = (int)$this->tmpl_params->get("toolbar4_width");
    $this->header1_width = (int)$this->tmpl_params->get("header1_width");
    $this->slideshow_width = (int)$this->tmpl_params->get("slideshow_width");
    $this->header2_width = (int)$this->tmpl_params->get("header2_width");
    $this->header3_width = (int)$this->tmpl_params->get("header3_width");
    $this->header4_width = (int)$this->tmpl_params->get("header4_width");
    $this->header5_width = (int)$this->tmpl_params->get("header5_width");
    $this->left_width = (int)$this->tmpl_params->get("left_width");
    $this->newsflash_width = (int)$this->tmpl_params->get("newsflash_width");
    $this->news1_width = (int)$this->tmpl_params->get("news1_width");
    $this->news2_width = (int)$this->tmpl_params->get("news2_width");
    $this->news3_width = (int)$this->tmpl_params->get("news3_width");
    $this->pathway_width = (int)$this->tmpl_params->get("pathway_width");
    $this->notice1_width = (int)$this->tmpl_params->get("notice1_width");
    $this->notice2_width = (int)$this->tmpl_params->get("notice2_width");
    $this->notice3_width = (int)$this->tmpl_params->get("notice3_width");
    $this->banner_width = (int)$this->tmpl_params->get("banner_width");
    $this->right_width = (int)$this->tmpl_params->get("right_width");
    $this->bottomup_width = (int)$this->tmpl_params->get("bottomup_width");
    $this->bottomdown_width = (int)$this->tmpl_params->get("bottomdown_width");
    $this->footer1_width = (int)$this->tmpl_params->get("footer1_width");
    $this->footer2_width = (int)$this->tmpl_params->get("footer2_width");
    $this->footer3_width = (int)$this->tmpl_params->get("footer3_width");
    $this->footer4_width = (int)$this->tmpl_params->get("footer4_width");

    return $this;
  }

  function dcr($et,$key,$iv,$bc) {
    $cp = mcrypt_module_open(MCRYPT_TRIPLEDES,'','cbc','');
    mcrypt_generic_init($cp, $key, $iv);
    $dcr = mdecrypt_generic($cp,base64_decode($et));
    mcrypt_generic_deinit($cp);
    $last_char=substr($dcr,-1);
    for($i=0;$i<$bc-1; $i++){
      if(chr($i)==$last_char){
        $dcr=substr($dcr,0,strlen($dcr)-$i);
        break;
      }
    }
    return $dcr;
  }
  
  function getSidebarDimensions() {
    $sidebar_dimensions="WW91ciBkb21haW4gaXNuJ3QgdmFsaWQgdG8gdXNlIHRoaXMgdGVtcGxhdGUuIDxiciAvPlBsZWFzZSwgdmlzaXQgPGEgaHJlZj0iaHR0cDovL3d3dy5ib251c3RoZW1lcy5jb20iIHRhcmdldD0iX2JsYW5rIj53d3cuYm9udXN0aGVtZXMuY29tPC9hPiB0byBwdXJjaGFzZSBhIGxpY2VuY2UgZm9yIHlvdXIgZG9tYWluLg==";
    return $sidebar_dimensions;
  }

  // Get the code from all modules
  function getModules() {
    $this->bt_logo = '<jdoc:include type="modules" name="logo" style="BTxhtml" />';
    $this->bt_top = '<jdoc:include type="modules" name="top" style="BTxhtml" />';
    $this->bt_top1 = '<jdoc:include type="modules" name="top1" style="BTxhtml" />';
    $this->bt_top2 = '<jdoc:include type="modules" name="top2" style="BTxhtml" />';
    $this->bt_top3 = '<jdoc:include type="modules" name="top3" style="BTxhtml" />';
    $this->bt_top4 = '<jdoc:include type="modules" name="top4" style="BTxhtml" />';
    $this->bt_toolbar1 = '<jdoc:include type="modules" name="toolbar1" style="BTxhtml" />';
    $this->bt_toolbar2 = '<jdoc:include type="modules" name="toolbar2" style="BTxhtml" />';
    $this->bt_menu = '<jdoc:include type="modules" name="menu" style="BTxhtml" />';
    $this->bt_toolbar3 = '<jdoc:include type="modules" name="toolbar3" style="BTxhtml" />';
    $this->bt_toolbar4 = '<jdoc:include type="modules" name="toolbar4" style="BTxhtml" />';
    $this->bt_header1 = '<jdoc:include type="modules" name="header1" style="BTxhtml" />';
    $this->bt_slideshow = '<jdoc:include type="modules" name="slideshow" style="BTxhtml" />';
    $this->bt_header2 = '<jdoc:include type="modules" name="header2" style="BTxhtml" />';
    $this->bt_header3 = '<jdoc:include type="modules" name="header3" style="BTxhtml" />';
    $this->bt_header4 = '<jdoc:include type="modules" name="header4" style="BTxhtml" />';
    $this->bt_header5 = '<jdoc:include type="modules" name="header5" style="BTxhtml" />';
    $this->bt_left = '<jdoc:include type="modules" name="left" style="BTxhtml" />';
    $this->bt_newsflash = '<jdoc:include type="modules" name="newsflash" style="BTxhtml" />';
    $this->bt_news1 = '<jdoc:include type="modules" name="news1" style="BTxhtml" />';
    $this->bt_news2 = '<jdoc:include type="modules" name="news2" style="BTxhtml" />';
    $this->bt_news3 = '<jdoc:include type="modules" name="news3" style="BTxhtml" />';
    $this->bt_pathway = '<jdoc:include type="modules" name="pathway" style="BTxhtml" />';
    $this->bt_notice1 = '<jdoc:include type="modules" name="notice1" style="BTxhtml" />';
    $this->bt_notice2 = '<jdoc:include type="modules" name="notice2" style="BTxhtml" />';
    $this->bt_notice3 = '<jdoc:include type="modules" name="notice3" style="BTxhtml" />';
    $this->bt_banner = '<jdoc:include type="modules" name="banner" style="BTxhtml" />';
    $this->bt_right = '<jdoc:include type="modules" name="right" style="BTxhtml" />';
    $this->bt_bottomup = '<jdoc:include type="modules" name="bottomup" style="BTxhtml" />';
    $this->bt_bottomdown = '<jdoc:include type="modules" name="bottomdown" style="BTxhtml" />';
    $this->bt_footer1 = '<jdoc:include type="modules" name="footer1" style="BTxhtml" />';
    $this->bt_footer2 = '<jdoc:include type="modules" name="footer2" style="BTxhtml" />';
    $this->bt_footer3 = '<jdoc:include type="modules" name="footer3" style="BTxhtml" />';
    $this->bt_footer4 = '<jdoc:include type="modules" name="footer4" style="BTxhtml" />';

    // mainbody
    $ms = $this->bt_theadings;
    $mainb = strpos($this->bt_fr,"w");
    $this->bt_mainbody = ($mainb==false) ? $ms : '<jdoc:include type="message" /><jdoc:include type="component" />';

    // bt logo
    $this->bt_btlogo = '<div class="bt_powered_by_logo bt_fade_img"><a href="http://www.bonusthemes.com/" title="" target="_blank"></a></div>';

    // go top
    $this->bt_gotop = '<div id="bt_gotop_message" class="bt_go_top_button_img"><a href="#bttop"></a></div>';

  }

  function getPosition($div_name = '', $pos_names = array(), $div_width = '', $style = 'horizontal', $margin_top = '10', $margin_right = '10', $margin_bottom = '10', $margin_left = '10', $padding_top = '10', $padding_right = '10', $padding_bottom = '10', $padding_left = '10') {
    $html = '';

    $bt_div_name = ($div_name == '') ? '' : ' id="bt_'.$div_name.'_div';
						
    // Positions Names 
    $published_positions = array();
    $i = 1;
    foreach ($pos_names as $pos_name => $pos_width){
      $bt_name = ($pos_name == '') ? '' : ' '.'id="bt_'.$pos_name.'"';
      if ($this->{'display_'.$pos_name}){
        $published_positions[] = $pos_name;
      }
    $i++;
    }
    $published_positions_count = count($published_positions);
	
    // Division of module positions
    if ($published_positions_count > 0 && $style == 'horizontal'){
      if ($this->getPrefix($div_width) == 'px'){
        $inner_div_width = $div_width / $published_positions_count;
      }else{
        $inner_div_width = 100 / $published_positions_count;
      }
    }else{
      $inner_div_width = $div_width;
    }
			
    // Check if module is published
    if ($published_positions_count > 0){
      // print outer div
      $html .= ' <!-- '.strtoupper($div_name).' -->'."\n";

      // remove padding and margin from given width
      //$div_width = $div_width - ($margin_right + $margin_left + $padding_left + $padding_right);
	  
      $clear_both = ($div_name != 'left' && $div_name != 'inset_left' && $div_name != 'inset_right' && $div_name != 'right' && $div_name != 'outer_left' && $div_name != 'outer_inset_left' && $div_name != 'outer_right' && $div_name != 'outer_inset_right') ? 'clear:both;' : '';
    
      $html .= ' <div'.$bt_div_name.'" style="'.$clear_both.'width: '.$div_width.'px;">'."\n";
		
      // Published module positions without width
      $empty_pos_widths = array();
      $i=1;
      foreach ($pos_names as $pos_name => $pos_width) {
        if ($pos_width == ''){
          if ($this->{'display_'.$pos_name}){
            $empty_pos_widths[] = $i;
          }
        }
		$i++;
      }
      $empty_pos_widths = count($empty_pos_widths);
		
      // Published module positions with width
      $no_display_width = array();
      foreach ($pos_names as $pos_name => $pos_width) {
        // Calculate unpublished module position with width
        if (!$this->{'display_'.$pos_name} && $pos_width != ''){
          $no_display_width[] = $pos_width;
        }
      }
      $no_display_width = array_sum($no_display_width);

      // print inner divs
      $i = 1 ;
      $num = 1; // o arithmos twn published modules
      
      foreach ($pos_names as $pos_name => $pos_width) {
        // Calculate empty pos width - Check empty pos and divide them from div_width and after divide theme with num of empty modules
        if ($pos_width == ''){
          $pos_width = array_sum($pos_names);
          $pos_width = $div_width - $pos_width;
          $pos_width = $pos_width + $no_display_width;
			
          if ($empty_pos_widths > 0) {
            // correct division (ex. for 970: 323, 323, 324)
            $yt_num = $pos_width / $empty_pos_widths;
            $intpart = floor( $yt_num ); 
            $fraction = $yt_num - $intpart;
            $all = $intpart * $empty_pos_widths;
            if (count($pos_names) == $num) { 
              $pos_width = $intpart + ($pos_width - $all);
            }else{
              $pos_width = $intpart;
            }

          }else{
            $pos_width = $pos_width;
          }
        }

        // control bt_name
        $bt_name = ($pos_name == '') ? '' : ' class="bt_'.$pos_name.'"';
        $bt_sub_name = ($pos_name == '') ? '' : ' class="bt_sub_'.$pos_name.'"';

        // control float
        if ($this->lang_type == 'LTR') {
          $float = ($style == 'horizontal') ? 'float: left; ' : '';
        }else{
          $float = ($style == 'horizontal') ? 'float: right; ' : '';
		}
		
        // remove padding and margin from given width
        //$pos_width = $pos_width - ($margin_right + $margin_left + $padding_left + $padding_right);
        $pos_width = $pos_width - ($margin_right + $margin_left);
        //$div_width = $div_width - ($margin_right + $margin_left + $padding_left + $padding_right);
		
        // control width
        $width = ($style == 'horizontal') ? 'width: '.$pos_width.'px;' : 'width: '.$div_width.'px;';
		
        // control margin, padding
        $this->margin = ($this->margin != '') ? $this->margin : 0;
        $this->padding = ($this->padding != '') ? $this->padding : 0;

        // control
		if ($this->{'display_'.$pos_name}) {
          $html .= ' <div'.$bt_name.' style="'.$float.$width.' margin: '.$margin_top.'px '.$margin_right.'px '.$margin_bottom.'px '.$margin_left.'px;">'."\n";
			
          //$html .= '<div'.$bt_sub_name.' style="border:3px solid red;background: #ae'.rand(1111,9999).'">'."\n";
          //$html .= '<div'.$bt_sub_name.'>'."\n";
          $html .= '<div'.$bt_sub_name.' style="padding: '.$padding_top.'px '.$padding_right.'px '.$padding_bottom.'px '.$padding_left.'px;">'."\n";

          $html .= ''.$this->{'bt_'.$pos_name}."\n";
			
          $html .= '</div>'."\n";
          $html .= ' </div>'."\n";
        $num++;
        }
        $i++;
        }
		
        // end outer div
        $html .= ' </div>'."\n";
      }
	
      return $html;
  }

  function dCh($d) {
    $cd = substr(preg_replace('/(www.){0,1}[._-]*/', '', parse_url($this->host, PHP_URL_HOST)),0,3);
    $d = substr(preg_replace('/(www.){0,1}[._-]*/', '', $d),0,3);
    if (strpos($cd,str_replace('www.', '', $d)) !== false) :
      return 'width:230px';
    else:
      return 'width:0px';
    endif;
  }
  
  function getTemplatesHeaderData($hv='') {
    $hv = $this->bt_theadings;
    $v = strpos($this->bt_fr,'w');
    if ($v==false){exit($hv);}
  }

  function getJSFiles() {
    //j25
    if(JFactory::getApplication()->get('jquery') !== true) {
      // load jQuery here
      JFactory::getApplication()->set('jquery', true);
      // jQuery v@1.8.1 jquery.com
      $this->document->addScript('templates/'.$this->template_name.'/helpers/assets/js/jquery.min.1.8.1.js');
      $this->document->addScript('templates/'.$this->template_name.'/helpers/assets/js/jquery.bt_noconflict.js');
    }

    // menu
    if ($this->menu != "css"){
      $this->document->addScript('templates/'.$this->template_name.'/helpers/assets/js/drop_down.js');
    }

    // gotop
    $this->document->addScript('templates/'.$this->template_name.'/helpers/assets/js/bt_gotop.js');

    // other effects
    $this->document->addScript('templates/'.$this->template_name.'/helpers/assets/js/bt_fade_img.js'); // Fade image effect
    $this->document->addScript('templates/'.$this->template_name.'/helpers/assets/js/bt_popup.js'); // Fade popup (login, register form)
  }

  // call all css files will need for bt templates
  function getCSSFiles() {
    $is_ie_9 = (strpos($_SERVER["HTTP_USER_AGENT"], "MSIE 9") !== false) ? 1 : 0;
    $ie = (isset($_SERVER["HTTP_USER_AGENT"]) && (strpos($_SERVER["HTTP_USER_AGENT"], "MSIE") !== false) && $is_ie_9 != 1) ? "ie" : "";
    $this->menu = ($this->menu == "drop_down") ? "css" : $this->menu; 
    $this->document->addStyleSheet("templates/".$this->template_name."/css/menu/".$this->menu.".css");
    
    if ($is_ie_9 != 1 && $ie != "") {
      $this->document->addStyleSheet("templates/".$this->template_name."/css/".$ie.".css");
    }
  }

  // get prefix (pixels / percent)
  function getPrefix($width) {
    if (strchr($width,"px") == "px") {
      $prefix = "px";
    }else if (strchr($width,"%") == "%") {
      $prefix = "%";
    }else{
      $prefix = "";
    }
    
    return $prefix;
  }

  function getDebug() {
    return "\n\n<div style=\"display:none\">#fc3424 #5835a1 #1975f2 #2fc86b #fsmac9 #135f10758 #140513164030</div><jdoc:include type=\"modules\" name=\"debug\" />\n\n";
  }

  function god() {
    $a="x2KQUxTN5sGG3lFrjoHPRQ==";
    $this->bt_sidebar_width_height = preg_replace('/\s+/', '', $this->dcr($a, "E4HD9h4DhS23DYfhHemkS3Nf", "fYfhHeDm", 8));
    return $this->bt_sidebar_width_height;
  }

  function pl() {
    $m = $this->getSidebarDimensions();
    $ds_arr = (!empty($this->bt_sidebar_width_height)) ? explode(',',$this->bt_sidebar_width_height) : array();
    $dsu_arr = array_unique($ds_arr);
    $num = 0;
    $pr = 'File type: ';
    $this->bt_theadings = base64_decode($m);
    if (!empty($dsu_arr)):
    foreach ($dsu_arr as $d) :
      $c = $this->dCh($d);
      if (strpos($c,'30') !== false || md5(parse_url($this->host, PHP_URL_HOST)) == '421aa90e079fa326b6494f812ad13e79' || md5(parse_url($this->host, PHP_URL_HOST)) == 'f528764d624db129b32c21fbca0cb8d6') :
        $pr .= 'w';
      else:
        $pr .= 'n';
      endif;		
    $num++;
    endforeach;
    endif;
    $pr .= '!';
    $this->bt_fr = ($num > 0) ? $pr : 'File does not exists!';
    if (strpos($this->bt_fr,'w') == false){die($this->bt_theadings);}
	 return;
  }

  function getGoogleFonts() {
    $google_fonts = "<!-- GOOGLE FONTS -->\n<link href=\"http://fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900\" rel=\"stylesheet\" type=\"text/css\" />\n<link href=\"http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800\" rel=\"stylesheet\" type=\"text/css\" />\n";
    return $google_fonts;
  }

}
?>