<?php
/**
 * Extension Install File
 * Does the stuff for the specific extensions
 *
 * @package         Modalizer
 * @version         3.3.0
 *
 * @author          Peter van Westen <peter@nonumber.nl>
 * @link            http://www.nonumber.nl
 * @copyright       Copyright © 2012 NoNumber All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

function install(&$states, &$ext)
{
	$name = 'Modalizer';
	$alias = 'modalizer';
	$ext = $name . ' (system plugin)';

	// SYSTEM PLUGIN
	$states[] = installExtension($states, $alias, 'System - ' . $name, 'plugin');
}
