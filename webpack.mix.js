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


if (process.env.section) {
    require(`${__dirname}/webpack.mix.${process.env.section}.js`);
} else {
    const mix = require('laravel-mix');
    mix.js('resources/js/app.js', 'public/assets/js/app.js')
        .js('resources/js/dropzone.js', 'public/assets/js/dropzone.js')
        .sass('resources/css/app.scss', 'public/assets/css/app.css')
}
