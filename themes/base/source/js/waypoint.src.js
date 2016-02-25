//     /* Waypoint Sections
// ------------------------*/

(function($){
    $(document).ready(function() {
        if($('.section').length) {
            var extraOffset = 2,
                headerSize = $('.top-bar').outerHeight(false);

            $('.section').each(function(i){
                var $elm = $(this),
                    waypoint = new Waypoint({
                        element : $elm,
                        handler : function(direction) {
                            $('.section, .menu a').removeClass('active');
                            if(direction == 'up'){
                                $elm = $elm.prev('.section');
                            }
                            $elm.addClass('active');
                            $('.menu').find('a[href*=#'+ $elm.attr('id') +']').addClass('active');
                        },
                        offset : headerSize
                    });
            });
            $('.menu>li>a').click(function(event){
                event.preventDefault();
                var offset = $($(this).prop("hash")).offset(),
                scrollSpot = (offset.top - headerSize) + extraOffset;
                $.scrollTo(scrollSpot, 800);
            });
        }
    });
})(jQuery);
