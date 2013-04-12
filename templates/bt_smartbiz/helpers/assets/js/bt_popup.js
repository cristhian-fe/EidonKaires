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
jQuery(document).ready(function() {  
 
 	// Using jQuery to center a DIV on the screen
	// http://stackoverflow.com/questions/210717/using-jquery-to-center-a-div-on-the-screen
	// jquery 1.6.4
	/*jQuery.fn.center = function () {
		this.css("position","absolute");
		this.css("top", Math.max(0, (($(window).height() - this.height()) / 2) + $(window).scrollTop()) + "px");
		this.css("left", Math.max(0, (($(window).width() - this.width()) / 2) + $(window).scrollLeft()) + "px");
		return this;
	}*/
	
	// jquery 1.7.2
	jQuery.fn.center = function() {
    this.css({
        'position': 'fixed',
        'left': '50%',
        'top': '50%',
    });
    this.css({
        'margin-left': -this.width() / 2 + 'px',
        'margin-top': -this.height() / 2 + 'px'
    });

    return this;
	}

    //select all the a tag with name equal to modal
    jQuery('a[name=modal]').click(function(e) {
        //Cancel the link behavior
        e.preventDefault();
        //Get the A tag
        var id = jQuery(this).attr('href');
     
        //Get the screen height and width
        var maskHeight = jQuery(document).height();
        var maskWidth = jQuery(window).width();
     
        //Set height and width to mask to fill up the whole screen
        jQuery('.mask').css({'width':maskWidth,'height':maskHeight});
         
        //transition effect     
        jQuery('#mask_login').fadeIn(400);    
        jQuery('#mask_login').fadeTo("slow",0.9);  
     
        //Get the window height and width
        var winH = jQuery(window).height();
        var winW = jQuery(window).width();
               
        //Set the popup window to center
     	jQuery(id).center();
		
        //transition effect
        jQuery(id).fadeIn(400); 
     
    });
     
    //if close button is clicked
    jQuery('.window .close').click(function (e) {
        //Cancel the link behavior
        e.preventDefault();
        jQuery('#mask_login, .window').hide();
    });     
     
    //if mask is clicked
    jQuery('#mask_login').click(function () {
        jQuery(this).hide();
        jQuery('.window').hide();
    });         
     
});