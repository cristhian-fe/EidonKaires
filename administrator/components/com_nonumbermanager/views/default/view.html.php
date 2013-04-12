<?php
/**
 * @package         NoNumber Extension Manager
 * @version         4.1.7
 *
 * @author          Peter van Westen <peter@nonumber.nl>
 * @link            http://www.nonumber.nl
 * @copyright       Copyright © 2012 NoNumber All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View class for default list view
 */
class NoNumberManagerViewDefault extends JView
{
	protected $items;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		$this->items = $this->get('Items');

		if (JFactory::getApplication()->input->get('task') == 'update') {
			$tpl = 'update';
		} else {
			$this->addToolbar();
		}
		// Include the component HTML helpers.
		JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
		parent::display($tpl);
	}

	/**
	 * Function that gets the config settings
	 */
	protected function getConfig()
	{
		if (!isset($this->config)) {
			require_once JPATH_PLUGINS . '/system/nnframework/helpers/parameters.php';
			$parameters = NNParameters::getInstance();
			$this->config = $parameters->getComponentParams('nonumbermanager');
		}
		return $this->config;
	}

	/**
	 * Add the page title and toolbar
	 */
	protected function addToolbar()
	{
		$canDo = $this->getActions();

		JFactory::getDocument()->setTitle(JText::_('NONUMBER_EXTENSION_MANAGER'));

		JToolbarHelper::title(JText::_('NONUMBER_EXTENSION_MANAGER'), 'nonumbermanager');

		if ($canDo->get('core.admin')) {
			JToolbarHelper::preferences('com_nonumbermanager', '400');
		}
	}

	/**
	 * Gets a list of the actions that can be performed.
	 */
	public static function getActions()
	{
		$user = JFactory::getUser();
		$result = new JObject;
		$assetName = 'com_nonumbermanager';

		$actions = array(
			'core.admin', 'core.manage'
		);

		foreach ($actions as $action) {
			$result->set($action, $user->authorise($action, $assetName));
		}

		return $result;
	}
}
