let mix = require('laravel-mix');

const themepath = 'themes/demo';
const distpath = themepath + '/dist/';

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

mix.scripts([
    'node_modules/jquery-legacy/node_modules/jquery/dist/jquery.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.min.js',
    'node_modules/owl.carousel/dist/owl.carousel.min.js',
    'node_modules/wow.js/dist/wow.min.js',
    'node_modules/jquery-parallax/scripts/jquery.parallax-1.1.3.js',
    'node_modules/jquery-countdown/dist/jquery.countdown.min.js',
    'node_modules/flexslider/jquery.flexslider.js',
    'node_modules/chosen-jquery/lib/chosen.jquery.min.js',
    'node_modules/jquery.counterup/jquery.counterup.min.js',
    'node_modules/waypoints/src/waypoint.js',
    'node_modules/sweetalert/dist/sweetalert.min.js'
    ], 'public/assets/user/js/app.js');
mix.copyDirectory('resources/assets/user', 'public/assets/user').browserSync('http://127.0.0.1:8000/');
mix.copyDirectory('resources/assets/fonts', 'public/assets/user/fonts');
mix.copyDirectory('resources/assets/admin', 'public/assets/admin');
mix.copyDirectory('resources/assets/img', 'public/assets/img');
mix.styles([
    'node_modules/bootstrap/dist/css/bootstrap.min.css',
    'node_modules/owl.carousel/dist/assets/owl.carousel.css',
    'node_modules/font-awesome/css/font-awesome.min.css',
    'node_modules/flexslider/flexslider.css',
    'node_modules/chosen-jquery/lib/chosen.min.css',
    'node_modules/animate.css/animate.min.css',
], 'public/assets/user/css/app.css');
