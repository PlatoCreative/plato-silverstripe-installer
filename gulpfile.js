/*-------------------------------------------------------------------
Required plugins
-------------------------------------------------------------------*/
var elixir = require('laravel-elixir');

/*-------------------------------------------------------------------
Configuration
-------------------------------------------------------------------*/

elixir.config.assetsPath = 'themes/base';
elixir.config.publicPath = 'themes/base';
elixir.config.sourcemaps = true;
elixir.config.css.sass.folder = 'scss';
elixir.config.css.autoprefix.options.browsers = ['> 1%', 'IE > 8'];

/*-------------------------------------------------------------------
Tasks
-------------------------------------------------------------------*/

elixir(function(mix) {
    mix.sass('app.scss');
    mix.sass('editor.scss');
    mix.webpack('app.js', elixir.config.publicPath + '/js/app.min.js');
});
