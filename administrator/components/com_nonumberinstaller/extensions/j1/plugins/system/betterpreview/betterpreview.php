<?php
/**
 * Main Plugin File
 * Does all the magic!
 *
 * @package         Better Preview
 * @version         2.2.2
 *
 * @author          Peter van Westen <peter@nonumber.nl>
 * @link            http://www.nonumber.nl
 * @copyright       Copyright © 2012 NoNumber All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

// Import library dependencies
jimport('joomla.plugin.plugin');

/**
 * Plugin that makes the preview button as it should be
 */
class plgSystemBetterPreview extends JPlugin
{
	function __construct(&$subject, $config)
	{
		$this->_pass = 0;
		parent::__construct($subject, $config);
	}

	function onAfterRoute()
	{
		$this->_pass = 0;
		$app = JFactory::getApplication();

		// if current page is not an administrator page, return nothing
		if ($app->isSite() && JRequest::getCmd('action') != 'betterpreview') {
			return;
		}

		$document = JFactory::getDocument();
		$docType = $document->getType();

		// only in html
		if ($docType != 'html') {
			return;
		}

		// load the admin language file
		$lang = JFactory::getLanguage();
		if ($lang->getTag() != 'en-GB') {
			// Loads English language file as fallback (for undefined stuff in other language file)
			$lang->load('plg_' . $this->_type . '_' . $this->_name, JPATH_ADMINISTRATOR, 'en-GB');
		}
		$lang->load('plg_' . $this->_type . '_' . $this->_name, JPATH_ADMINISTRATOR, null, 1);

		jimport('joomla.filesystem.file');
		// return if NoNumber Framework plugin is not installed
		if (!JFile::exists(JPATH_PLUGINS . '/system/nnframework/nnframework.php')) {
			if ($app->isAdmin() && JRequest::getCmd('option') != 'com_login') {
				$msg = JText::_('BP_NONUMBER_FRAMEWORK_NOT_INSTALLED');
				$msg .= ' ' . JText::sprintf('BP_EXTENSION_CAN_NOT_FUNCTION', JText::_('BETTER_PREVIEW'));
				$mq = $app->getMessageQueue();
				foreach ($mq as $m) {
					if ($m['message'] == $msg) {
						$msg = '';
						break;
					}
				}
				if ($msg) {
					$app->enqueueMessage($msg, 'error');
				}
			}
			return;
		}

		$this->_pass = 1;

		// Load plugin parameters
		require_once JPATH_PLUGINS . '/system/nnframework/helpers/parameters.php';
		$parameters = NNParameters::getInstance();
		$params = $parameters->getPluginParams('betterpreview');

		// Include the Helper
		require_once JPATH_PLUGINS . '/' . $this->_type . '/' . $this->_name . '/helper.php';
		$class = get_class($this) . 'Helper';
		$this->helper = new $class($params);

		$this->helper->prePreviewArticle();
	}

	function onPrepareContent(&$article)
	{
		if ($this->_pass) {
			$this->helper->previewArticle($article);
		}
	}

	function onAfterRender()
	{
		if ($this->_pass) {
			$this->helper->updateBody();
		}
	}
}
