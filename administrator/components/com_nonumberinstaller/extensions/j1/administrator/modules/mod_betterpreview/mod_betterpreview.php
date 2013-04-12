<?php
/**
 * Main Module File
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

/**
 * Module that gives a preview link
 */

// return if NoNumber Framework plugin is not installed
jimport('joomla.filesystem.file');
if (!JFile::exists(JPATH_PLUGINS . '/system/nnframework/nnframework.php')) {
	return;
}

// Include the Helper
require_once __DIR__ . '/betterpreview/helper.php';
$helper = new modBetterPreview;

$helper->render();
