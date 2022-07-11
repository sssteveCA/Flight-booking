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

-mix.js('resources/js/app.js', 'public/js').vue()
+mix.ts('resources/js/welcome.ts','public/js').vue()
+mix.ts('resources/js/auth/register.ts','public/js/auth').vue()
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/welcome.scss','public/css')
    .sass('resources/sass/welcome/flightpriceresult.scss','public/css/welcome')
    .sourceMaps();
