const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.copyDirectory([
    'node_modules/bootstap/dist/css',
    'node_modules/metismenu/dist',
    'node_modules/sb-admin-2/dist/css',
    'node_modules/@fortawesome/fontawesome-free/css',
    
], 'public/css');

mix.copyDirectory([
	'node_modules/jquery/dist',
	'node_modules/bootstap/dist/js',
	'node_moduels/metismenu/dist',
	'node_modules/sb-admin-2/dist/js',

], 'public/js');

mix.copyDirectory([
	'node_modules/@fortawesome/fontawesome-free/webfonts',

], 'public/fonts');
