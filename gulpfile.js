var elixir = require('laravel-elixir');
require('laravel-elixir-stylus');
elixir.config.publicPath='compiled';
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

 elixir(function(mix) {
 	mix.copy('vendor/bower_components/open-sans/fonts/','compiled/fonts/')
 	.copy('vendor/bower_components/bootstrap-sass/assets/fonts/','compiled/fonts/')
 	.copy('vendor/bower_components/font-awesome-sass/assets/fonts/','compiled/fonts/')
 	.copy('vendor/bower_components/jquery/dist/jquery.js','resources/assets/js')
 	.copy('vendor/bower_components/tether/dist/js/tether.js','resources/assets/js')
 	.copy('vendor/bower_components/bootstrap/dist/js/bootstrap.js','resources/assets/js')
 	.copy('vendor/bower_components/scroll-parallax/dist/Parallax.js','resources/assets/js')
 	.sass('sass.scss', 'resources/assets/css',
 	{
 		includePaths:[
 		__dirname + '/vendor/bower_components',
 		]

 	})
 	.stylus('app.styl','resources/assets/css')
	.styles(['sass.css'],'compiled/css/assets.css')
	.styles(['app.css'],'compiled/css/main.css')
 	.scripts(['jquery.js','tether.js','bootstrap.js','Parallax.js'],'compiled/js/assets.js')
	.scripts(['main.js'],'compiled/js/main.js')
 	.version(['css/assets.css','css/main.css','js/assets.js','js/main.js']);
 });

