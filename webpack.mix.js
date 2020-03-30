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

mix.react('resources/js/business-page.js', 'public/js')
   .react('resources/js/zipcode-autocomplete.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
