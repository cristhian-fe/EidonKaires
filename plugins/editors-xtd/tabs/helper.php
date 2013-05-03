<?php
/**
 * Plugin Helper File
 *
 * @package         Tabs
 * @version         3.1.1
 *
 * @author          Peter van Westen <peter@nonumber.nl>
 * @link            http://www.nonumber.nl
 * @copyright       Copyright © 2012 NoNumber All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

/**
 ** Plugin that places the button
 */
class plgButtonTabsHelper
{
	function __construct(&$params)
	{
		$this->params = $params;
	}

	/**
	 * Display the button
	 *
	 * @return array A two element array of ( imageName, textToInsert )
	 */
	function render($name)
	{
		$button = new JObject;

		if (JFactory::getApplication()->isSite()) {
			$enable_frontend = $this->params->enable_frontend;
			if (!$enable_frontend) {
				return $button;
			}
		}

		JHtml::stylesheet('tabs/button.min.css', false, true);

		$this->params->tag_open = preg_replace('#[^a-z0-9-_]#s', '', $this->params->tag_open);
		$this->params->tag_close = preg_replace('#[^a-z0-9-_]#s', '', $this->params->tag_close);
		$this->params->tag_delimiter = ($this->params->tag_delimiter == '=') ? '=' : ' ';

		if ($this->params->button_use_custom_code && $this->params->button_custom_code) {
			$text = trim($this->params->button_custom_code);
			$text = str_replace(array("\r", "\n"), array('', '</p>\n<p>'), trim($text)) . '</p>';
			$text = preg_replace('#^(.*?)</p>#', '\1', $text);
			$text = str_replace(array('{tab ', '{/tabs}'), array('{' . $this->params->tag_open . $this->params->tag_delimiter, '{/' . $this->params->tag_close . '}'), trim($text));
		} else {
			$text = '{' . $this->params->tag_open . $this->params->tag_delimiter . JText::_('TAB_TITLE') . ' 1}\n' .
				'<p>' . JText::_('TAB_TEXT') . '</p>\n' .
				'<p>{' . $this->params->tag_open . $this->params->tag_delimiter . JText::_('TAB_TITLE') . ' 2}</p>\n' .
				'<p>' . JText::_('TAB_TEXT') . '</p>\n' .
				'<p>{/' . $this->params->tag_close . '}</p>';
		}
		$text = str_replace('\\\\n', '\\n', addslashes($text));
		$text = str_replace('{', '{\'+\'', $text);

		$js = "
			function insertTabs(editor) {
				jInsertEditorText('" . $text . "', editor);
			}
		";
		JFactory::getDocument()->addScriptDeclaration($js);

		$class = 'nn_tabs';
		if (!$this->params->button_icon) {
			$class = 'blank blank_nn_tabs';
		}

		$text_ini = strtoupper(str_replace(' ', '_', $this->params->button_text));
		$text = JText::_($text_ini);
		if ($text == $text_ini) {
			$text = JText::_($this->params->button_text);
		}

		$button->set('modal', false);
		$button->set('link', '#');
		$button->set('onclick', 'insertTabs(\'' . $name . '\');return false;');
		$button->set('text', trim($text));
		$button->set('name', $class);

		return $button;
	}
}
