require('es6-promise').polyfill();
var elixir = require('laravel-elixir');
elixir.config.sourcemaps = false;

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
	// LESS
	//mix.less('app.less').version('css/app.css');
	
	// SASS
	mix.sass([
			'style.scss',
		],
		'public/css/style.css'
	);
	mix.sass([
			'admin/style.scss',
		],
		'public/css/admin/style.css'
	);
	
	
	// JS
	mix.scripts([
			'main.js',
		],
		'public/js/main.js'
	);
	mix.scripts([
			'admin/main.js',
			'admin/user.js',
		],
		'public/js/admin/main.js'
	);
	mix.scripts([
			'common.js',
		],
		'public/js/common.js'
	);
	
	// jQuery Datepicker
	mix.scripts([
			'datepicker/jquery.ui.core.min.js',
			'datepicker/jquery.ui.datepicker-ja.min.js',
			'datepicker/jquery.ui.datepicker.min.js',
			'datepicker/jquery.ui.ympicker.js',
		],
		'public/js/datepicker.js'
	);
	
	// Version
	mix.version([
		'css/style.css',
		'css/admin/style.css',
		'js/main.js',
		'js/admin/main.js',
	]);
	
});
