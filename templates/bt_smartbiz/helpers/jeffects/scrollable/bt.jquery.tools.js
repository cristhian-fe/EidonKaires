var jQueryBtTools = jQuery.noConflict();
jQueryBtTools(function() {
	jQueryBtTools.easing.bt_custom = function (x, t, b, c, d) {
		var s = 1.70158;
		if (1 > (t/=d/2)) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;
		return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;
	}
jQueryBtTools(".bt_scrollabe_slider").scrollable({easing: 'bt_custom', keyboard: false, speed: 900, circular: true});})