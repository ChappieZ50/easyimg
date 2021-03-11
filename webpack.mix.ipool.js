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


mix.js('resources/js/ipool/app.js', 'public/ipool/assets/js/app.js').version()
    .sass('resources/css/ipool/app.scss', 'public/ipool/assets/css/app.css');
