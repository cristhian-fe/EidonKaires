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

/**
 * @package        Joomla.Administrator
 * @subpackage     com_nonumbermanager
 * @copyright      Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View for the install processes
 */
class NoNumberManagerViewProcess extends JView
{
	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		$action = JFactory::getApplication()->input->get('action');
		if ($action) {
			$model = $this->getModel();
			if ($action == 'install') {
				echo $model->install(JFactory::getApplication()->input->get('id'), JFactory::getApplication()->input->getString('url'));
				die;
			} else if ($action == 'uninstall') {
				echo $model->uninstall(JFactory::getApplication()->input->get('id'));
				die;
			}
		}

		$this->items = $this->get('Items');
		$this->getConfig();

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
}
