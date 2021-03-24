(function($) {
	"use strict";
	
	//headerfixed
	$(window).on("scroll", function(e){
		if ($(window).scrollTop() >= 76) {
			$('.admin-navbar').addClass('fixed-header');
			$('.admin-navbar').addClass('visible-title');
		}
		else {
			$('.admin-navbar').removeClass('fixed-header');
			$('.admin-navbar').removeClass('visible-title');
		}
    });
})(jQuery);