/*
** Omni Post Slider
*/
jQuery(document).ready(function($) {
	var $slider = $('.omni-slider-carousel');
	$slider.owlCarousel({
		items: 1,
		loop: true,
		autoplay: true,
		autoplayTimeout: 5000,
		nav: false,
		dots: false,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
	});

	$('.omni-prev').click(function() {
		$slider.trigger('prev.owl.carousel');
	});
	$('.omni-next').click(function() {
		$slider.trigger('next.owl.carousel');
	});
});
