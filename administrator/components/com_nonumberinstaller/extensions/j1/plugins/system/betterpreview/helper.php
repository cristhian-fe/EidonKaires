<?php
/**
 * Plugin Helper File
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
 * Plugin that replaces Sourcerer code with its HTML / CSS / JavaScript / PHP equivalent
 */
class plgSystemBetterPreviewHelper
{
	function __construct(&$params)
	{
		$this->params = $params;
	}

	function prePreviewArticle()
	{
		$action = JRequest::getCmd('action');
		$show = JRequest::getCmd('show', 0);
		if ($action != 'betterpreview' || $show) {
			return;
		}

		$lang = JFactory::getLanguage();
		if ($lang->getTag() != 'en-GB') {
			// Loads English language file as fallback (for undefined stuff in other language file)
			$lang->load('plg_system_betterpreview', JPATH_ADMINISTRATOR, 'en-GB');
		}
		$lang->load('plg_system_betterpreview', JPATH_ADMINISTRATOR);

		$editor_name = JRequest::getCmd('editor', 'none');
		if ($editor_name != 'none') {
			$db = JFactory::getDBO();
			$query = "SELECT id"
				. " FROM #__plugins"
				. " WHERE folder = 'editors'"
				. " AND published = 1"
				. " AND element = '" . $editor_name . "'";
			$db->setQuery($query);
			if (!$db->loadResult()) {
				$editor_name = 'none';
			}
		}
		if (!defined('JPATH_COMPONENT_ADMINISTRATOR')) {
			define('JPATH_COMPONENT_ADMINISTRATOR', JPATH_ADMINISTRATOR . '/components/com_' . $editor_name);
		}

		jimport('joomla.html.editor');
		$editor = new JEditor($editor_name);
		?>
	<html>
	<body onload="sendForm()">

	<form action="" method="post" id="adminForm">
		<input type="hidden" name="show" value="1">
		<input type="hidden" name="title" id="title" value="1">
		<input type="hidden" name="text" id="text" value="1">
	</form>

	<div
		style="text-align: center;font-family: Arial, Verdana, sans-serif;"><?php echo JText::_('BP_LOADING'); ?></div>

	<script type="text/javascript">
		function sendForm()
		{
			var form = parent.document.adminForm;
			if (!form) {
				alert('<?php echo addslashes(JText::_('BP_THIS_PAGE_ONLY_WORKS_AS_POPUP')); ?>');
			} else {
				var title = form.title.value;

				var alltext = window.top.<?php echo $editor->getContent('text'); ?>;
				alltext = alltext.replace(/<hr\s+id=["']system-readmore["']\s\/*>/i, '');

				document.getElementById('title').value = title;
				document.getElementById('text').value = alltext;
				document.getElementById('adminForm').submit();
			}
		}
	</script>
	</body>
	</html>
	<?php
		die;
	}

	function previewArticle(&$article)
	{
		$action = JRequest::getCmd('action');
		if ($action != 'betterpreview') {
			return;
		}

		$document = JFactory::getDocument();
		$document->addStyleDeclaration('body{ margin: 0; padding: 10px; }');

		$db = JFactory::getDBO();

		$id = JRequest::getInt('id');
		$query = 'SELECT a.*, u.name AS author, u.usertype, cc.title AS category, s.title AS section,' .
			' CASE WHEN CHAR_LENGTH(a.alias) THEN CONCAT_WS(":", a.id, a.alias) ELSE a.id END as slug,' .
			' CASE WHEN CHAR_LENGTH(cc.alias) THEN CONCAT_WS(":", cc.id, cc.alias) ELSE cc.id END as catslug,' .
			' g.name AS groups, s.published AS sec_pub, cc.published AS cat_pub, s.access AS sec_access, cc.access AS cat_access ' .
			' FROM #__content AS a' .
			' LEFT JOIN #__categories AS cc ON cc.id = a.catid' .
			' LEFT JOIN #__sections AS s ON s.id = cc.section AND s.scope = "content"' .
			' LEFT JOIN #__users AS u ON u.id = a.created_by' .
			' LEFT JOIN #__groups AS g ON a.access = g.id' .
			' WHERE a.id = ' . (int) $id;
		$db->setQuery($query);
		$article = $db->loadObject();
		$article->parameters = new JParameter($article->attribs);

		$article->title = stripslashes($_POST['title']);
		$article->text = stripslashes($_POST['text']);

		// run all onPrepareContent plugins again that have been handled before BetterPreview
		$dispatcher = clone(JDispatcher::getInstance());
		$unset = 0;
		foreach ($dispatcher->_observers as $i => $observer) {
			if (!is_array($observer) && $observer->_name == 'betterpreview') {
				$unset = 1;
			}
			if ($unset) {
				unset($dispatcher->_observers[$i]);
			}
		}
		$dispatcher->trigger('onPrepareContent', array(&$article, &$article->parameters, 0));
	}

	function updateBody()
	{
		$app = JFactory::getApplication();
		$action = JRequest::getCmd('action');

		$body = JResponse::getBody();

		if ($app->isAdmin()) {
			$this->updateLinks($body);
		} else if ($action == 'betterpreview') {
			$this->protectIconLinks($body);
		}

		JResponse::setBody($body);
	}

	function protectIconLinks(&$body)
	{
		$lang = JFactory::getLanguage();
		if ($lang->getTag() != 'en-GB') {
			// Loads English language file as fallback (for undefined stuff in other language file)
			$lang->load('plg_system_betterpreview', JPATH_ADMINISTRATOR, 'en-GB');
		}
		$lang->load('plg_system_betterpreview', JPATH_ADMINISTRATOR);

		$regex = '#(<' . 'td [^>]*class="buttonheading"[^>]*>(?:\s*<span [^>]*>)?)\s*<a [^>]*>\s*(<img [^>]*>)\s*</a>\s*((?:</span>\s*)?</td>)#si';
		$replace = '\1<a href="javascript:alert(\'' . JText::_('BP_DISABLED_IN_PREVIEW_MODE') . '\');" title="' . JText::_('BP_DISABLED_IN_PREVIEW_MODE') . '">\2</a>\3';
		$body = preg_replace($regex, $replace, $body);
	}

	function updateLinks(&$body)
	{
		// correct large article preview link in tool bar
		$regex = '#(href="[^"]*)administrator/(index\.php\?option=com_content)([^"]*)&id=([^"]*tmpl=component)&task=preview"(.*?class="icon-32-preview)"#si';
		preg_match($regex, $body, $match);

		if (!empty($match)) {
			$db = JFactory::getDBO();

			$jnow = JFactory::getDate();
			$now = $jnow->toMySQL();
			$nullDate = $db->getNullDate();

			$query = 'SELECT a.id'
				. ' FROM #__content AS a'
				. ' LEFT JOIN #__categories AS c ON c.id = a.catid'
				. ' LEFT JOIN #__sections AS s ON s.id = c.section AND s.scope = "content"'
				. ' WHERE a.state = 1 AND a.access = 0'
				. ' AND ( a.publish_up = ' . $db->quote($nullDate) . ' OR a.publish_up <= ' . $db->quote($now) . ' )'
				. ' AND ( a.publish_down = ' . $db->quote($nullDate) . ' OR a.publish_down >= ' . $db->quote($now) . ' )'
				. ' AND s.published = 1 AND s.access = 0'
				. ' AND c.published = 1 AND c.access = 0';
			$db->setQuery($query);
			$dummyid = $db->loadResult();
			if ($dummyid) {
				$body = str_replace('</head>', "\t" . '<link rel="stylesheet" href="' . JURI::root(true) . '/plugins/system/betterpreview/css/style.css" type="text/css" />' . "\n" . '</head>', $body);
				$editor = JFactory::getEditor();
				$replace = '\1\2&view=article\3&bid=\4&id=' . $dummyid . '&action=betterpreview&editor=' . $editor->_name . '"\5 icon-32-betterpreview"';
				$body = preg_replace($regex, $replace, $body);
			}
		}
	}
}
