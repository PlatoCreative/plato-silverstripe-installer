/*-------------------------------------------------------------------
Required plugins
-------------------------------------------------------------------*/
const { mix } = require('laravel-mix');

/*-------------------------------------------------------------------
Tasks
-------------------------------------------------------------------*/
mix.autoload({
    'jquery': ['$', 'jQuery', 'window.jQuery'],
    'axios': ['window.axios']
})
.js('themes/base/js/app.js', 'themes/base/js/app.min.js').sourceMaps()
.sass('themes/base/scss/app.scss',  'themes/base/css/').options({
    processCssUrls: false
})
.sass('themes/base/scss/editor.scss', 'themes/base/css/');

// BrowserSync - e.g. "localhost/mysite.com"
mix.browserSync({
    proxy: 'localhost/[YOURSITENAME.CO.NZ]',
    files: ["themes/base/css/*", "themes/base/js/app.min.js", "themes/base/templates/*.ss", "themes/base/templates/*/*.ss"]
});
