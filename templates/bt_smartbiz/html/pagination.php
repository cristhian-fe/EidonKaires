<?php
/*---------------------------------------------------------
# BT - Joomla! Template
# ---------------------------------------------------------
# For Joomla! 2.5
# Copyright (C) 2012 Bonusthemes.com. All rights reserved.
# @license Copyrighted Commercial Software
# Website: http://www.bonusthemes.com
# Support: support@bonusthemes.com
----------------------------------------------------------- */

defined( '_JEXEC' ) or die( 'Restricted access' ); 

function pagination_list_footer($list)
{
	$html = "<div class=\"list-footer\">\n";

	$html .= "\n<div class=\"limit\">".JText::_('Display Num').$list['limitfield']."</div>";
	$html .= $list['pageslinks'];
	$html .= "\n<div class=\"counter\">".$list['pagescounter']."</div>";

	$html .= "\n<input type=\"hidden\" name=\"limitstart\" value=\"".$list['limitstart']."\" />";
	$html .= "\n</div>";

	return $html;
}

function pagination_list_render($list)
{
	// Initialize variables
	$html = "<ul class=\"pagination\">";
	$html .= $list['start']['data'];
	$html .= $list['previous']['data'];
	$html .= '<li style="color: #f8f8f8; cursor: default;">...</li>';

	foreach( $list['pages'] as $page )
	{
		if($page['data']['active']) {
		}

		$html .= $page['data'];

		if($page['data']['active']) {
		}
	}
	
	$html .= '<li style="color: #f8f8f8; cursor: default;">...</li>';
	$html .= $list['next']['data'];
	$html .= $list['end']['data'];

	$html .= "</ul>";
	return $html;
}

function pagination_item_active(&$item) {
	return "<li class=\"inactive\"><a href=\"".$item->link."\" title=\"".$item->text."\">".$item->text."</a></li>";
}

function pagination_item_inactive(&$item) {
	return "<li class=\"active\">".$item->text."</li>";
}