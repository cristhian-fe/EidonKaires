var jQueryNivo = $.noConflict(true);
jQueryNivo(window).load(function() {
	jQueryNivo('#bt_nivo_slider_random').nivoSlider({
		effect: 'random', // more effect types: http://dev7studios.com/nivo-slider/#/documentation
		slices: 15,
		boxCols: 8,
		boxRows: 4,
		animSpeed: 500,
		pauseTime: 3000,
		startSlide: 0,
		directionNav: true,
		controlNav: true,
		controlNavThumbs: false,
		pauseOnHover: false,
		manualAdvance: false,
		prevText: 'Prev',
		nextText: 'Next',
		randomStart: false,
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){},
		lastSlide: function(){},
		afterLoad: function(){}
	});
	jQueryNivo('#bt_nivo_slider_fade_slow').nivoSlider({
		effect: 'fade',
		animSpeed: 1000,
		pauseTime: 7000
	});
});