(function ($) {
    "use strict";

    // Preloder
	$(window).on('load', function() {

	$('body').delay(100).css({'overflow':'visible'});



		$('.all-portfolios').isotope({
			itemSelector:'.single-portfolio'
		});

		$('.portfolio-nav ul li').on('click', function(){
			$('.portfolio-nav ul li').removeClass('active-portfolio');
			$(this).addClass('active-portfolio');
			
			var selector = $(this).attr('data-filter');
			$('.all-portfolios').isotope({
				filter:selector
			});
			return false;
		});
	});
	
	
	
})(jQuery);