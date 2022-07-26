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
+mix.ts('resources/js/profile/myFlights.ts','public/js/profile').vue()
+mix.ts('resources/js/profile/myFlights/flight.ts','public/js/profile/myFlights').vue()
+mix.ts('resources/js/contacts.ts','public/js').vue()
+mix.ts('resources/js/login.ts','public/js').vue()
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/welcome.scss','public/css')
    .sass('resources/sass/welcome/flightpriceresult.scss','public/css/welcome')
    .sass('resources/sass/profile/myFlights.scss','public/css/profile')
    .sass('resources/sass/profile/myFlights/flight.scss','public/css/profile/myFlights')
    .sass('resources/sass/news.scss','public/css')
    .sass('resources/sass/news/post.scss','public/css/news')
    .sass('resources/sass/aboutus.scss','public/css')
    .sass('resources/sass/contacts.scss','public/css')
    .sourceMaps();
