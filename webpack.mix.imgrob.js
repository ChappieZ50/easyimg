const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/imgrob/app.js', 'public/imgrob/assets/js/app.js').version()
    .sass('resources/css/imgrob/app.scss', 'public/imgrob/assets/css/app.css');
