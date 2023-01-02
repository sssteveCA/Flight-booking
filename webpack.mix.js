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
+mix.ts('resources/js/welcome.ts','public/js')
+mix.ts('resources/js/welcome.hotel.ts','public/js')
+mix.ts('resources/js/auth/register.ts','public/js/auth')
+mix.ts('resources/js/profile/myFlights.ts','public/js/profile')
+mix.ts('resources/js/profile/myFlights/flight.ts','public/js/profile/myFlights')
+mix.ts('resources/js/contacts.ts','public/js')
+mix.ts('resources/js/login.ts','public/js')
+mix.ts('resources/js/layouts/menu.ts','public/js/layouts/')
+mix.ts('resources/js/profile/info.ts','public/js/profile')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/welcome.scss','public/css')
    .sass('resources/sass/bookflight/bookflight.scss','public/css/bookflight')
    .sass('resources/sass/bookhotel/bookhotel.scss','public/css/bookhotel')
    .sass('resources/sass/error/errors.scss','public/css/error')
    .sass('resources/sass/welcome/flightpriceresult.scss','public/css/welcome')
    .sass('resources/sass/welcome/hotelpriceresult.scss','public/css/welcome')
    .sass('resources/sass/profile/myFlights.scss','public/css/profile')
    .sass('resources/sass/profile/myHotels.scss','public/css/profile')
    .sass('resources/sass/profile/myFlights/flight.scss','public/css/profile/myFlights')
    .sass('resources/sass/news.scss','public/css')
    .sass('resources/sass/news/post.scss','public/css/news')
    .sass('resources/sass/aboutus.scss','public/css')
    .sass('resources/sass/contacts.scss','public/css')
    .sass('resources/sass/login.scss','public/css')
    .sass('resources/sass/register.scss','public/css')
    .sass('resources/sass/profile/info.scss','public/css/profile')
    .sass('resources/sass/footer.scss','public/css')
    .sass('resources/sass/layouts/menu.scss','public/css/layouts')
    .sourceMaps();
