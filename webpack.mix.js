const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/sorttable.js', 'public/js')
    .js('resources/js/hamburger.js', 'public/js')
    .copyDirectory('resources/images', 'public/images')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/home_page.scss', 'public/css')
    .sass('resources/sass/landing.scss', 'public/css')
    .sass('resources/sass/main.scss', 'public/css')
    .sass('resources/sass/files.scss', 'public/css')
    .sass('resources/sass/quotations.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css')
    .sass('resources/sass/coo.scss', 'public/css')
    .extract();

if (mix.inProduction()) {
    mix.version();
}