<?php 
  
 /**
 * @package Form Maker Lite 
 * @author Web-Dorado
 * @copyright (C) 2011 Web-Dorado. All rights reserved.
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 **/

defined('_JEXEC') or die('Restricted access');

class Tableformmaker extends JTable

{

var $id = null;

var $mail = null;

var $title = null;

var $form = null;
var $form_front = null;
var $pagination = null;
var $show_title = null;
var $show_numbers = null;
var $counter = null;
var $submit_text = null;
var $url = null;
var $submit_text_type = null;
var $javascript = null;
var $theme = null;
var $script1 = null;
var $script2 = null;
var $script_user1 = null;
var $script_user2 = null;
var $article_id = null;
var $label_order = null;
var $published = null;
var $public_key = null;
var $private_key = null;
var $recaptcha_theme = null;




function __construct(&$db)

{

parent::__construct('#__formmaker','id',$db);

}

}

?>