<?php
/**
 * NoNumber Framework Helper File: Assignments: URLs
 *
 * @package         NoNumber Framework
 * @version         13.2.2
 *
 * @author          Peter van Westen <peter@nonumber.nl>
 * @link            http://www.nonumber.nl
 * @copyright       Copyright © 2012 NoNumber All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

/**
 * Assignments: URLs
 */
class NNFrameworkAssignmentsURLs
{
	function passURLs(&$parent, &$params, $selection = array(), $assignment = 'all')
	{
		$url = JURI::getInstance();
		$url = $url->toString();
		$regex = isset($params->regex) ? $params->regex : 0;

		if (!is_array($selection)) {
			$selection = explode("\n", $selection);
		}

		$pass = 0;
		foreach ($selection as $s) {
			$s = trim($s);
			if ($s != '') {
				if ($regex) {
					$url_part = str_replace(array('#', '&amp;'), array('\#', '(&amp;|&)'), $s);
					$s = '#' . $url_part . '#si';
					if (@preg_match($s . 'u', $url)
						|| @preg_match($s . 'u', html_entity_decode($url, ENT_COMPAT, 'UTF-8'))
							|| @preg_match($s, $url)
								|| @preg_match($s, html_entity_decode($url, ENT_COMPAT, 'UTF-8'))
					) {
						$pass = 1;
						break;
					}
				} else {
					if (!(strpos($url, $s) === false)
						|| !(strpos(html_entity_decode($url, ENT_COMPAT, 'UTF-8'), $s) === false)
					) {
						$pass = 1;
						break;
					}
				}
			}
		}

		return $parent->pass($pass, $assignment);
	}
}
