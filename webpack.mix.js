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
    .react()
    .sass('resources/sass/app.scss', 'public/css')
    .styles(['resources/css/customs.css',],'public/dist/vendor.css',)
    .scripts(['resources/js/input.js',],'public/dist/vendor.js')
    .copy(['resources/assets/images/favicon.ico',],'public/images/',)
    .version()
    ;
