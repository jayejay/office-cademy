let mix = require('laravel-mix');

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
//
// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');

const WebpackShellPlugin = require('webpack-shell-plugin');

// Add shell command plugin configured to create JavaScript language file
mix.webpackConfig({
    plugins:
        [
            new WebpackShellPlugin({onBuildStart:['php artisan lang:js public/js/localization/messages.js --quiet'], onBuildEnd:[]})
        ]
});

mix.less('resources/assets/less/styles.less', 'public/css/styles.css')
    .less('resources/assets/less/pdf_styles.less', 'public/css/pdf_styles.css')
    .copy('resources/assets/images/office.jpg', 'public/images/office.jpg')
    .options({
    processCssUrls: true
});
