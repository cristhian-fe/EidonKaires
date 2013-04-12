/*---------------------------------------------------------
# BT Smartbiz - Joomla! Template
# ---------------------------------------------------------
# For Joomla! 2.5
# Copyright (C) 2013 Bonusthemes.com. All rights reserved.
# @license Copyrighted Commercial Software
# Demo: http://www.bonusthemes.com/demo/?template=smartbiz
# Website: http://www.bonusthemes.com
# Support: support@bonusthemes.com
----------------------------------------------------------- */
var $j = jQuery.noConflict();

$j(function() {
        $j(".bt_fade_img")
        .find("a")
        .hide()
        .end()
        .hover(function() {
                $j(this).find("a").stop(true, true).fadeIn(500);
        }, function() {
                $j(this).find("a").stop(true, true).fadeOut(1000);
        });
});