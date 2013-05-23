<?php 
  
 /**
 * @package Form Maker Lite
 * @author Web-Dorado
 * @copyright (C) 2011 Web-Dorado. All rights reserved.
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 **/

defined('_JEXEC') or die('Restricted access');

require_once( JApplicationHelper::getPath( 'toolbar_html' ) );

switch ( $task )

{
	case 'themes'  :
	{
		TOOLBAR_formmaker::_THEMES();
	}
		break;
		
	case 'add_themes'  :
	case 'edit_themes'  :
	{
		TOOLBAR_formmaker::_NEW_THEMES();
	}
		break;
		
	case 'submits'  :
	{
		TOOLBAR_formmaker::_SUBMITS();
	}
		break;
		
	case 'edit_submit'  :
	{
		TOOLBAR_formmaker::EDIT_SUBMITS();
	}
		break;
		
	case 'add'  :
	case 'edit'  :	
	{
		TOOLBAR_formmaker::_NEW();
	}
		break;

	case 'edit_javascript'  :	
	case 'edit_my_javascript'  :	
	{
		TOOLBAR_formmaker::_NEW_JavaSCRIPT();
	}
		break;

	case 'edit_css'  :	
	case 'edit_my'  :	
	{
		TOOLBAR_formmaker::_NEW_CSS();
	}
		break;

	case 'edit_script'  :	
	case 'edit_my_script'  :	
	{
		TOOLBAR_formmaker::_NEW_SCRIPT();
	}
		break;
		
	case 'edit_script_user'  :	
	case 'edit_my_script_user'  :	
	{
		TOOLBAR_formmaker::_NEW_SCRIPT_USER();
	}
		break;

	case 'edit_submit_text'  :	
	case 'edit_my_submit_text'  :	
	{
		TOOLBAR_formmaker::_NEW_SUBMIT_TEXT();
	}
		break;


	default:
		TOOLBAR_formmaker::_DEFAULT();
		break;

}

?>