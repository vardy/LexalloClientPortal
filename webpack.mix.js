const mix = require('laravel-mix');
const path = require('path');

let ServiceWorkerPlugin = require('serviceworker-webpack-plugin');

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/sorttable.js', 'public/js')
    .copyDirectory('resources/images', 'public/images')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/home_page.scss', 'public/css')
    .sass('resources/sass/landing.scss', 'public/css')
    .sass('resources/sass/main.scss', 'public/css')
    .sass('resources/sass/files.scss', 'public/css')
    .sass('resources/sass/quotations.scss', 'public/css')
    .sass('resources/sass/reach.scss', 'public/css')
    .extract();

if (mix.inProduction()) {
    mix.version();
}

mix.webpackConfig({
    plugins: [
        new ServiceWorkerPlugin({
            entry: path.join(__dirname, './resources/js/service_worker.js'),
        })
    ]
});