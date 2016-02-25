$(document).foundation();

(function($){
    $(document).ready(function() {
        // google analytics
        $('[data-ga-label]').each(function(){
            $(this).on('click', function() {
                var $trackingName = $(this).data('ga-label'),
                $tagName = $(this).prop("tagName"),
                $action = 'click';
                if($tagName=='input'){
                    $action = 'submit';
                }
                ga('send', 'event', 'button', $action, $trackingName);
            });
        });

        // fancybox
        $(".fancybox").fancybox({
            openEffect  : 'none',
            closeEffect : 'none',
            helpers : {
                media : {}
            }
        });
    });
})(jQuery);
