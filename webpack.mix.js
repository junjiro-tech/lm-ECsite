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
    .js('resources/js/top_page_slide.js', 'public/js')
    .autoload({
    "jquery": ['$', 'window.jQuery'],
    "vue": ['Vue', 'window.Vue']
    })
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/top_page.scss', 'public/css')
    .sass('resources/sass/search.scss', 'public/css')
    .sass('resources/sass/register.scss', 'public/css')
    .sass('resources/sass/privacy.scss', 'public/css')
    .sass('resources/sass/page_navi.scss', 'public/css')
    .sass('resources/sass/login.scss', 'public/css')
    .sass('resources/sass/hyouki.scss', 'public/css')
    .sass('resources/sass/contact.scss', 'public/css')
    .sass('resources/sass/confirm.scss', 'public/css')
    .sass('resources/sass/complete.scss', 'public/css')
    .sass('resources/sass/cart.scss', 'public/css');
    
