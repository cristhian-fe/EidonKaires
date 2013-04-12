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

jimport('joomla.application.component.controller');

/**
 * Default manager master display controller.
 *
 * @package        Joomla.Administrator
 * @subpackage     com_nonumbermanager
 * @since          1.6
 */
class NoNumberManagerController extends JController
{
	/**
	 * @var        string    The default view.
	 * @since    1.6
	 */
	protected $default_view = 'default';
}
