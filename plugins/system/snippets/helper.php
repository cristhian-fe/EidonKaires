<?php
/**
 * Plugin Helper File
 *
 * @package         Snippets
 * @version         3.0.5
 *
 * @author          Peter van Westen <peter@nonumber.nl>
 * @link            http://www.nonumber.nl
 * @copyright       Copyright © 2012 NoNumber All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

// Load common functions
require_once JPATH_PLUGINS . '/system/nnframework/helpers/functions.php';
require_once JPATH_PLUGINS . '/system/nnframework/helpers/protect.php';

/**
 * System Plugin that places a Snippets code block into the text
 */
class plgSystemSnippetsHelper
{
	function __construct(&$params)
	{
		$this->option = JFactory::getApplication()->input->get('option');

		$this->params = $params;
		$this->params->comment_start = '<!-- START: Snippets -->';
		$this->params->comment_end = '<!-- END: Snippets -->';
		$this->params->message_start = '<!--  Snippets Message: ';
		$this->params->message_end = ' -->';

		$bts = '((?:<p(?: [^>]*)?>\s*)?)';
		$bte = '((?:\s*</p>)?)';
		$this->params->tag_regex = preg_quote($this->params->tag, '#') . (($this->params->tag == 'snippet') ? 's?' : '');
		$this->params->regex = '#' . $bts . '\{' . $this->params->tag_regex . ' ([^\}\|]+)((?:\|[^\}]+)?)\}' . $bte . '#s';

		require_once JPATH_ADMINISTRATOR . '/components/com_snippets/models/list.php';
		$list = new SnippetsModelList;
		$this->items = $list->getItems(1);
	}

	////////////////////////////////////////////////////////////////////
	// onContentPrepare
	////////////////////////////////////////////////////////////////////

	function onContentPrepare(&$article)
	{
		if (isset($article->text)) {
			$this->replaceTags($article->text);
		}
		if (isset($article->description)) {
			$this->replaceTags($article->description);
		}
		if (isset($article->title)) {
			$this->replaceTags($article->title);
		}
		if (isset($article->created_by_alias)) {
			$this->replaceTags($article->created_by_alias);
		}
	}

	////////////////////////////////////////////////////////////////////
	// onAfterDispatch
	////////////////////////////////////////////////////////////////////

	function onAfterDispatch()
	{
		if (JFactory::getDocument()->getType() != 'feed' && $this->option != 'com_acymailing' && JFactory::getDocument()->getType() != 'pdf') {
			return;
		}

		if ((JFactory::getDocument()->getType() == 'feed' || $this->option == 'com_acymailing') && isset(JFactory::getDocument()->items)) {
			$itemids = array_keys(JFactory::getDocument()->items);
			foreach ($itemids as $i) {
				$this->onContentPrepare(JFactory::getDocument()->items[$i]);
			}
		}

		// PDF
		if (JFactory::getDocument()->getType() == 'pdf') {
			// Still to do for Joomla 2.5
		}
	}

	////////////////////////////////////////////////////////////////////
	// onAfterRender
	////////////////////////////////////////////////////////////////////
	function onAfterRender()
	{
		// not in pdf's
		if (JFactory::getDocument()->getType() !== 'html' && JFactory::getDocument()->getType() !== 'feed') {
			return;
		}

		$html = JResponse::getBody();
		if ($html == '') {
			return;
		}

		if (JFactory::getDocument()->getType() != 'html') {
			$this->replaceTags($html);
		} else {
			// only do the handling inside the body
			if (!(strpos($html, '<body') === false) && !(strpos($html, '</body>') === false)) {
				$html_split = explode('<body', $html, 2);
				$body_split = explode('</body>', $html_split['1'], 2);

				// only do stuff in body
				$this->protect($body_split['0']);
				$this->replaceTags($body_split['0']);

				$html_split['1'] = implode('</body>', $body_split);
				$html = implode('<body', $html_split);
			} else {
				$this->protect($html);
				$this->replaceTags($html);
			}
		}

		$this->cleanLeftoverJunk($html);
		$this->unprotect($html);

		JResponse::setBody($html);
	}

	function replaceTags(&$str)
	{
		if (!is_string($str) || $str == '') {
			return;
		}

		while (preg_match_all($this->params->regex, $str, $matches, PREG_SET_ORDER) > 0) {
			foreach ($matches as $match) {
				$snippet_html = $this->processSnippet(trim($match['2']), trim($match['3']));
				if ($this->params->place_comments) {
					$snippet_html = $this->params->comment_start . $snippet_html . $this->params->comment_end;
				}
				if (!$match['1'] || !$match['4']) {
					$snippet_html = trim($match['1']) . $snippet_html . trim($match['4']);
				}
				$str = str_replace($match['0'], $snippet_html, $str);
			}
		}
	}

	function processSnippet($id, $vars)
	{
		$item = isset($this->items[$id]) ? $this->items[$id] : isset($this->items[html_entity_decode($id, ENT_COMPAT, 'UTF-8')]) ? $this->items[html_entity_decode($id, ENT_COMPAT, 'UTF-8')] : '';

		if (!$item) {
			if ($this->params->place_comments) {
				return $this->params->message_start . JText::_('SNP_OUTPUT_REMOVED_NOT_FOUND') . $this->params->message_end;
			} else {
				return '';
			}
		}

		if (!$item->published) {
			if ($this->params->place_comments) {
				return $this->params->message_start . JText::_('SNP_OUTPUT_REMOVED_NOT_ENABLED') . $this->params->message_end;
			} else {
				return '';
			}
		}

		$html = $item->content;
		if ($vars) {
			$vars = explode('|', $vars);
			foreach ($vars as $i => $var) {
				if ($i) {
					$html = preg_replace('#\\\\' . $i . '(?![0-9])#', $var, $html);
				}
			}
		}

		if (!(strpos($html, '[[escape]]') === false)) {
			if (preg_match_all('#\[\[escape\]\](.*?)\[\[/escape\]\]#s', $html, $matches, PREG_SET_ORDER) > 0) {
				foreach ($matches as $match) {
					$replace = addslashes($match['1']);
					$html = str_replace($match['0'], $replace, $html);
				}
			}
		}

		return $html;
	}

	function protect(&$str)
	{
		NNProtect::protectForm($str, '{' . $this->params->tag);
	}

	function unprotect(&$str)
	{
		NNProtect::unprotectForm($str, '{' . $this->params->tag);
	}

	/**
	 * Just in case you can't figure the method name out: this cleans the left-over junk
	 */
	function cleanLeftoverJunk(&$str)
	{
		$str = preg_replace($this->params->regex, '', $str);
		$str = preg_replace('#<\!-- (START|END): SN_[^>]* -->#', '', $str);
		if (!$this->params->place_comments) {
			$str = str_replace(
				array(
					$this->params->comment_start, $this->params->comment_end,
					htmlentities($this->params->comment_start), htmlentities($this->params->comment_end),
					urlencode($this->params->comment_start), urlencode($this->params->comment_end)
				), '', $str
			);
			$str = preg_replace('#' . preg_quote($this->params->message_start, '#') . '.*?' . preg_quote($this->params->message_end, '#') . '#', '', $str);
		}
	}
}
