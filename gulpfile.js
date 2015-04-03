var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

var paths = {
    'jquery': './vendor/bower_components/jquery/',
    'bootstrap': './vendor/bower_components/bootstrap-sass-official/assets/',
    'fontawesome': './vendor/bower_components/font-awesome/',
    'animatecss': './vendor/bower_components/animate.css/'
};

elixir(function(mix) {
    mix
        //Fonts
        .copy(paths.bootstrap + 'fonts/', 'public/fonts')
        .copy(paths.fontawesome + 'fonts/', 'public/fonts')

        //SASS
        .sass("app.scss", "public/css/", {
            includePaths: [
                paths.bootstrap + 'stylesheets/',
                paths.fontawesome + 'scss/'
            ]
        })

        //Javascript
        .scripts([
            paths.jquery + "dist/jquery.js",
            paths.bootstrap + "javascripts/bootstrap.js",
            "public/vendor/js/modernizr-2.8.3.min.js",
            "public/vendor/js/jquery.navgoco.min.js",
            "public/vendor/js/gauge.min.js",
            "resources/assets/js/app.js",
            "resources/assets/js/api-keys.js"
        ], "public/js/all.js", "./")

        //CSS
        .styles([
            'public/css/app.css',
            paths.animatecss + 'animate.min.css'
        ], "public/css/all.css", "./")

        .version([
            "public/css/all.css",
            "public/js/all.js"
        ]);
});