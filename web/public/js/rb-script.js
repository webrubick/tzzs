/**
 * @function      Include
 * @description   Includes an external scripts to the page
 * @param         {string} scriptUrl
 */
function include(scriptUrl) {
    document.write('<script src="' + scriptUrl + '"></script>');
}


/**
 * @function      isIE
 * @description   checks if browser is an IE
 * @returns       {number} IE Version
 */
function isIE() {
    var myNav = navigator.userAgent.toLowerCase();
    return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;
};


/**
 * @module       Copyright
 * @description  Evaluates the copyright year
 */
;
(function ($) {
    $(document).ready(function () {
        $(".copyright-year").text((new Date).getFullYear());
    });
})(jQuery);

/**
 * 控制导航栏的显示与隐藏
 */
;
(function ($) {
	var nav = $('.navbar');
	$(window).scroll(function() {
    	var n = $(window).scrollTop();
    	n >= 65 ? nav.addClass('fixed') : nav.removeClass('fixed');
	});
})(jQuery);

/**
 * 控制导航栏的显示与隐藏
 */
;
(function ($) {
    // 竖向的引线
    var homeContentBefore = $('.vline');
    var lineHeight = 30;
    
    var mains = $('main');
    var mainVPadding = 25;
    
    // 首页品牌的界面
	var brand = $('.brand');
	var brandMinHeight = 372 + 160 + 50;
	brand.css({
	    'padding-top': '160px',
	    'padding-bottom': '50px',
	});
	function update() {
		var n = $(window).height();
    	n = Math.max(n, brandMinHeight);
    	var m = Math.min(n - brandMinHeight + lineHeight, 100);
		brand.css({
			'min-height' : n + 'px',
		});
		
		homeContentBefore.css({
			'top' : (-m) + 'px',
			'height' : (m * 2) + 'px',
		});
		
		var o = (mainVPadding + m) + 'px';
		mains.css({
		    'padding-top': o,
		    'padding-bottom': o,
		});
	}
	update();
	$(window).resize(function() {
    	update();
	});
})(jQuery);


