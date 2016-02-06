var elixir = require('laravel-elixir');

var config = {
    bowerDir : '../../../bower_components/'
}

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');

    mix.styles([
        config.bowerDir + 'bootstrap/dist/css/bootstrap.min.css',
        config.bowerDir + 'font-awesome/css/font-awesome.min.css',
        config.bowerDir + 'Ionicons/css/ionicons.min.css',
        config.bowerDir + 'AdminLTE/dist/css/AdminLTE.min.css',
        config.bowerDir + 'AdminLTE/dist/css/skins/skin-red.min.css',
        config.bowerDir + 'mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css',
        config.bowerDir + 'trumbowyg/dist/ui/trumbowyg.min.css',
        config.bowerDir + 'bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css',
    ])
    .scripts([
        config.bowerDir + 'jquery/dist/jquery.min.js',
        config.bowerDir + 'bootstrap/dist/js/bootstrap.min.js',
        config.bowerDir + 'slimscroll/jquery.slimscroll.min.js',
        config.bowerDir + 'fastclick/lib/fastclick.js',
        config.bowerDir + 'mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js',
        config.bowerDir + 'trumbowyg/dist/trumbowyg.min.js',
        config.bowerDir + 'bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
        config.bowerDir + 'AdminLTE/dist/js/app.min.js',
        config.bowerDir + 'html5shiv/dist/html5shiv.min.js',
        config.bowerDir + 'respond/dest/respond.min.js',
        config.bowerDir + 'raphael/raphael-min.js',
        config.bowerDir + 'morris.js/morris.min.js',
        'scripts.js'
    ])
    .copy('./bower_components/font-awesome/fonts', 'public/fonts')
    .copy('./bower_components/mjolnic-bootstrap-colorpicker/dist/img/bootstrap-colorpicker', 'public/img/bootstrap-colorpicker')
    .copy('./bower_components/AdminLTE/dist/img', 'public/img')
    .copy('./bower_components/trumbowyg/dist/ui/images', 'public/css/images');
});
