
// Require jQuery
window.$ = window.jQuery = require('jquery/dist/jquery.js');
// Require Foundation
require('foundation-sites');

(function($) {

    $(document).foundation();

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
    });

}(jQuery));
