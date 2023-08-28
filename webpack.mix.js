const mix = require('laravel-mix');

mix.js('resources/js/agenda.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
