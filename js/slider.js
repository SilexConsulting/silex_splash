(function($) {
    $(function() {
        $('.jcarousel').jcarousel({
			animation: 'slow'
		});

		$('.jcarousel').jcarouselAutoscroll({
			autostart: true,
			interval: 8000
		});
    });
})(jQuery);
