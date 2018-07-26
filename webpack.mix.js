let mix = require('laravel-mix');

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

mix.js([
  'resources/assets/js/libs/bootstrap.min.js',
  'resources/assets/js/libs/metisMenu.js',
  'resources/assets/js/libs/sb-admin-2.js',
  'resources/assets/js/libs/scripts.js',
  'resources/assets/js/libs/script.js',
], 'public/js/app.js')
.sass('resources/assets/css/styles.scss', 'public/css/app.css');
