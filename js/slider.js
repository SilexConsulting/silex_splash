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

$('.jcarousel').on('jcarousel:create jcarousel:reload', function() {
    var element = $(this), width = element.innerWidth();
    element.jcarousel('items').css('width', width + 'px');
})
