$(document).foundation();

$(document).ready(function() {
    // standard images
    $(".fancybox").fancybox();
    // videos
    $('.fancybox-media').fancybox({
		openEffect  : 'none',
		closeEffect : 'none',
		helpers : {
			media : {}
		}
	});
});
