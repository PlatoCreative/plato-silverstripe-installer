/**
 * Load Plugins
 * If you don't see a plugin below it might be autloaded via webpack
 * Check webpack.mix.js for autoloaded plugins.
 */
require('jquery-match-height');

import { Foundation } from './foundation';
Foundation.addToJquery(jQuery);

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */
let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 *
 * Application script
 *
 */
$(function() {
    // init Foundation
    $(document).foundation();
});
