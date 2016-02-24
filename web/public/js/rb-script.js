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
	var brand = $('.brand');
	function updateMinHeight() {
		var n = $(window).height();
    	n = Math.max(n, 532);
		brand.css({
			'min-height' : n + 'px',
		});
	}
	updateMinHeight();
	$(window).resize(function() {
    	updateMinHeight();
	});
})(jQuery);


