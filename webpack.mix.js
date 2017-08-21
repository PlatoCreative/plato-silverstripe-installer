/*-------------------------------------------------------------------
Required plugins
-------------------------------------------------------------------*/
const { mix } = require('laravel-mix');

/*-------------------------------------------------------------------
Tasks
-------------------------------------------------------------------*/

// javascript
mix.webpackConfig({
    module: {
        rules: [
                {
                    test: /\.jsx?$/,
                    use: [
                        {
                            loader: 'babel-loader',
                            options: Config.babel()
                        }
                    ]
                }
            ]
        }
    })
    .autoload({
        'jquery': ['$', 'jQuery', 'window.jQuery'],
        'axios': ['window.axios']
    })
    .js(
        'themes/base/javascript/app.js',
        'themes/base/javascript/app.min.js'
    )
    .extract(['jquery']);

// scss
mix.sass(
        'themes/base/scss/app.scss',
        'themes/base/css/'
    )
    .sass(
        'themes/base/scss/editor.scss',
        'themes/base/css/'
    );
// generate sourcemaps
mix.sourceMaps();
// mix options
mix.options({
    processCssUrls: false,
    purifyCss: false,
    postCss: [require('autoprefixer')],
    clearConsole: true
});
// BrowserSync
mix.browserSync({
    proxy: 'localhost/[YOURSITENAME.CO.NZ]',
    files: [
        'themes/base/**/*.(css|ss|min.js)',
    ]
});
