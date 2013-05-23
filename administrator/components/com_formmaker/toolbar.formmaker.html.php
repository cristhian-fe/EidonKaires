<?php 
  
 /**
 * @package Form Maker Lite
 * @author Web-Dorado
 * @copyright (C) 2011 Web-Dorado. All rights reserved.
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 **/

defined('_JEXEC') or die('Restricted access');

	function save_css()
	{
		JToolBarHelper :: custom( 'save_css', 'save.png', '', 'Save', '', '' );
	}

	function apply_css()
	{
		JToolBarHelper :: custom( 'apply_css', 'apply.png', '', 'Apply', '', '' );
	}

	function cancel_secondary()
	{
		JToolBarHelper :: custom( 'cancel_secondary', 'cancel.png', '', 'Cancel', '', '' );
	}

	function edit_css()
	{
		JToolBarHelper :: custom( 'edit_my_css', 'css.png', '', 'Edit CSS', '', '' );
	}

	function edit_javascript()
	{
		JToolBarHelper :: custom( 'edit_my_javascript', 'options.png', '', 'Edit JavaScript', '', '' );
	}

	function save_javascript()
	{
		JToolBarHelper :: custom( 'save_javascript', 'save.png', '', 'Save', '', '' );
	}

	function apply_javascript()
	{
		JToolBarHelper :: custom( 'apply_javascript', 'apply.png', '', 'Apply', '', '' );
	}

/////////////////////////////////////////
	function save_script()
	{
		JToolBarHelper :: custom( 'save_script', 'save.png', '', 'Save', '', '' );
	}

	function apply_script()
	{
		JToolBarHelper :: custom( 'apply_script', 'apply.png', '', 'Apply', '', '' );
	}

	function edit_script()
	{
		JToolBarHelper :: custom( 'edit_my_script', 'edit.png', '', 'Custom text in email for administrator', '', '' );
	}
//////////////////////////////////////////////////	
	function save_script_user()
	{
		JToolBarHelper :: custom( 'save_script_user', 'save.png', '', 'Save', '', '' );
	}

	function apply_script_user()
	{
		JToolBarHelper :: custom( 'apply_script_user', 'apply.png', '', 'Apply', '', '' );
	}

	function edit_script_user()
	{
		JToolBarHelper :: custom( 'edit_my_script_user', 'edit.png', '', 'Custom text in email for user', '', '' );
	}
//////////////////////////////////////////////////	
	function edit_submit_text()
	{
		JToolBarHelper :: custom( 'edit_my_submit_text', 'edit.png', '', 'Actions after submission', '', '' );
	}
	
	function remove_submit()
	{
		JToolBarHelper :: custom( 'remove_submit', 'delete.png', '', 'Delete', '', '' );
	}

	function edit_submit()
	{
		JToolBarHelper :: custom( 'edit_submit', 'edit.png', '', 'Edit', '', '' );
	}
	
	function undo()
	{
		JToolBarHelper :: custom( 'undo', 'back.png', '', 'Undo', '', '' );
	}
	
	function redo()
	{
		JToolBarHelper :: custom( 'redo', 'forward.png', '', 'Redo', '', '' );
	}
	
///////////////////////////////////
	

	

class TOOLBAR_formmaker {

	function _THEMES() {
		$document =& JFactory::getDocument();
		$document->addStyleSheet('components/com_formmaker/FormMakerLogo.css');
		JToolBarHelper::title('Form Maker'.'<div style="float:right;padding-right: 15px; display:block"><a href="http://web-dorado.com/products/joomla-form.html" target="_blank" style=""><img src="components/com_formmaker/images/buyme.png" border="0" alt="http://web-dorado.com/files/fromSpiderCatalogJoomla.php" style="float:left"></a></div>', 'FormMakerLogo');		
		JToolBarHelper::makeDefault();
		JToolBarHelper::deleteList('Are you sure you want to delete? ', 'remove_themes');
		JToolBarHelper::editListX('edit_themes');
		JToolBarHelper::addNewX('add_themes');

	}
	
	function _NEW_THEMES() {
		$document =& JFactory::getDocument();
		$document->addStyleSheet('components/com_formmaker/FormMakerLogo.css');
		JToolBarHelper::title('Form Maker'.'<div style="float:right;padding-right: 15px; display:block"><a href="http://web-dorado.com/products/joomla-form.html" target="_blank" style=""><img src="components/com_formmaker/images/buyme.png" border="0" alt="http://web-dorado.com/files/fromSpiderCatalogJoomla.php" style="float:left"></a></div>', 'FormMakerLogo');		
		JToolBarHelper::save('save_themes');
		JToolBarHelper::apply('apply_themes');
		JToolBarHelper::cancel('cancel_themes');		
	}
	
	function EDIT_SUBMITS()
	{
		$document =& JFactory::getDocument();
		$document->addStyleSheet('components/com_formmaker/FormMakerLogo.css');
		JToolBarHelper::title('Form Maker'.'<div style="float:right;padding-right: 15px; display:block"><a href="http://web-dorado.com/products/joomla-form.html" target="_blank" style=""><img src="components/com_formmaker/images/buyme.png" border="0" alt="http://web-dorado.com/files/fromSpiderCatalogJoomla.php" style="float:left"></a></div>', 'FormMakerLogo');		
		JToolBarHelper::save('save_submit');
		JToolBarHelper::apply('apply_submit');
		JToolBarHelper::cancel('cancel_submit');		
	}
	
	function _SUBMITS() {
		$document =& JFactory::getDocument();
		$document->addStyleSheet('components/com_formmaker/FormMakerLogo.css');
		JToolBarHelper::title('Form Maker'.'<div style="float:right;padding-right: 15px; display:block"><a href="http://web-dorado.com/products/joomla-form.html" target="_blank" style=""><img src="components/com_formmaker/images/buyme.png" border="0" alt="http://web-dorado.com/files/fromSpiderCatalogJoomla.php" style="float:left"></a></div>', 'FormMakerLogo');		
		remove_submit();
		JToolBarHelper::editListX('edit_submit');
	}
	
	function _NEW_CSS() {
		$document =& JFactory::getDocument();
		$document->addStyleSheet('components/com_formmaker/FormMakerLogo.css');
		JToolBarHelper::title('Form Maker'.'<div style="float:right;padding-right: 15px; display:block"><a href="http://web-dorado.com/products/joomla-form.html" target="_blank" style=""><img src="components/com_formmaker/images/buyme.png" border="0" alt="http://web-dorado.com/files/fromSpiderCatalogJoomla.php" style="float:left"></a></div>', 'FormMakerLogo');		
		save_css();
		apply_css();
		cancel_secondary();		
	}
	
	function _NEW_SCRIPT() {
		$document =& JFactory::getDocument();
		$document->addStyleSheet('components/com_formmaker/FormMakerLogo.css');
		JToolBarHelper::title('For administrator'.'<div style="float:right;padding-right: 15px; display:block"><a href="http://web-dorado.com/products/joomla-form.html" target="_blank" style=""><img src="components/com_formmaker/images/buyme.png" border="0" alt="http://web-dorado.com/files/fromSpiderCatalogJoomla.php" style="float:left"></a></div>', 'FormMakerLogo');		
		save_script();
		apply_script();
		cancel_secondary();		
	}

	function _NEW_SCRIPT_USER() {
		$document =& JFactory::getDocument();
		$document->addStyleSheet('components/com_formmaker/FormMakerLogo.css');
		JToolBarHelper::title('For user'.'<div style="float:right;padding-right: 15px; display:block"><a href="http://web-dorado.com/products/joomla-form.html" target="_blank" style=""><img src="components/com_formmaker/images/buyme.png" border="0" alt="http://web-dorado.com/files/fromSpiderCatalogJoomla.php" style="float:left"></a></div>', 'FormMakerLogo');		
		save_script_user();
		apply_script_user();
		cancel_secondary();		
	}

	function _NEW_JavaSCRIPT() {
		$document =& JFactory::getDocument();
		$document->addStyleSheet('components/com_formmaker/FormMakerLogo.css');
		JToolBarHelper::title('Form Maker'.'<div style="float:right;padding-right: 15px; display:block"><a href="http://web-dorado.com/products/joomla-form.html" target="_blank" style=""><img src="components/com_formmaker/images/buyme.png" border="0" alt="http://web-dorado.com/files/fromSpiderCatalogJoomla.php" style="float:left"></a></div>', 'FormMakerLogo');		
		save_javascript();
		apply_javascript();
		cancel_secondary();		
	}

	function _NEW_SUBMIT_TEXT()
	{
		$document =& JFactory::getDocument();
		$document->addStyleSheet('components/com_formmaker/FormMakerLogo.css');
		JToolBarHelper::title('Form Maker'.'<div style="float:right;padding-right: 15px; display:block"><a href="http://web-dorado.com/products/joomla-form.html" target="_blank" style=""><img src="components/com_formmaker/images/buyme.png" border="0" alt="http://web-dorado.com/files/fromSpiderCatalogJoomla.php" style="float:left"></a></div>', 'FormMakerLogo');		
		JToolBarHelper::save('save_submit_text');
		JToolBarHelper::apply('apply_submit_text');
		cancel_secondary();		
	}

	function _NEW() {
		$document =& JFactory::getDocument();
		$document->addStyleSheet('components/com_formmaker/FormMakerLogo.css');
		JToolBarHelper::title('Form Maker'.'<div style="float:right;padding-right: 15px; display:block"><a href="http://web-dorado.com/products/joomla-form.html" target="_blank" style=""><img src="components/com_formmaker/images/buyme.png" border="0" alt="http://web-dorado.com/files/fromSpiderCatalogJoomla.php" style="float:left"></a></div>', 'FormMakerLogo');		
		edit_submit_text();
		edit_javascript();
		//edit_css();
		edit_script();
		edit_script_user();
		JToolBarHelper::save();
		JToolBarHelper::apply();
		JToolBarHelper :: custom( 'save_as_copy', 'copy.png', '', 'Save as Copy', '', '' );
		JToolBarHelper::cancel();		
	}

	function _DEFAULT() {
		$document =& JFactory::getDocument();
		$document->addStyleSheet('components/com_formmaker/FormMakerLogo.css');
		JToolBarHelper::title('Form Maker'.'<div style="float:right;padding-right: 15px; display:block"><a href="http://web-dorado.com/products/joomla-form.html" target="_blank" style=""><img src="components/com_formmaker/images/buyme.png" border="0" alt="http://web-dorado.com/files/fromSpiderCatalogJoomla.php" style="float:left"></a></div>', 'FormMakerLogo');		
		JToolBarHelper::customX( 'copy', 'copy.png', 'copy_f2.png', 'Copy' );
		JToolBarHelper::deleteList();
		JToolBarHelper::editListX();
		JToolBarHelper::addNewX();

	}

}

?>