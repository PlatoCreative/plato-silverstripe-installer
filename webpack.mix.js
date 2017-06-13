/*-------------------------------------------------------------------
Required plugins
-------------------------------------------------------------------*/
const { mix } = require('laravel-mix');

/*-------------------------------------------------------------------
Tasks
-------------------------------------------------------------------*/

// javascript
mix.js('themes/base/js/app.js', 'themes/base/js/app.min.js');
mix.autoload({
    'jquery': ['$', 'jQuery', 'window.jQuery'],
    'axios': ['window.axios']
});
mix.extract(['jquery']);
// scss
mix.sass('themes/base/scss/app.scss',  'themes/base/css/');
mix.sass('themes/base/scss/editor.scss', 'themes/base/css/');
// generate sourcemaps
mix.sourceMaps();
// mix options
mix.options({
  processCssUrls: false,
  //purifyCss: {
  //    paths: glob.sync([
  //        path.join(__dirname, 'themes/base/templates/**/*.ss')
  //    ]),
  //    minimize: true
  //},
  purifyCss: false,
  postCss: [require('autoprefixer')],
  clearConsole: true
});
// BrowserSync
mix.browserSync({
    proxy: 'localhost/[YOURSITENAME.CO.NZ]',
    files: ["themes/base/css/*", "themes/base/js/app.min.js", "themes/base/templates/**/*.ss"]
});

