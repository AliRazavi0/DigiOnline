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
    .sass('resources/sass/app.scss', 'public/css')
    .copy("resources/assets/fonts","public/fonts")
    .styles([
        "resources/assets/css/font-awesome.min.css",
        "resources/assets/css/materialdesignicons.css",
        "resources/assets/css/materialdesignicons.css.map",
        "resources/assets/css/bootstrap.css",
        "resources/assets/css/owl.carousel.min.css",
        "resources/assets/css/responsive.css",
        "resources/assets/css/main.css",

    ],"public/css/main.css")

    .scripts([
        "resources/assets/js/jquery-3.2.1.min.js",
        "resources/assets/js/bootstrap.js",
        "resources/assets/js/owl.carousel.min.js",
        "resources/assets/js/main.js",
    ],"public/js/main.js")

