const mix = require('laravel-mix');
mix.setPublicPath('static')
mix.sass('assets/scss/app.scss', 'css')
    .js('assets/js/app.js', 'js')
    .js('assets/js/admin/app.js', 'js/admin.js');