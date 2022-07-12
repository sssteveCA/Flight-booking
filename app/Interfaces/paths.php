<?php

namespace App\Interfaces;

interface Paths{

    //Prefixes
    const PREFIX_PROFILE = 'profile';

    //Routes
    const ROUTE_BOOKFLIGHT = 'bookflight';
    const ROUTE_FLIGHTPRICE = 'flightprice';
    const ROUTE_INFO = 'infocontroller.info';
    const ROUTE_EDITUSERNAME = 'infocontroller.editusername';
    const ROUTE_EDITPASSWORD = 'infocontroller.editpassword';

    //URLs
    const URL_AIRPORTSEARCH = '/airportsearch';
    const URL_BOOKFLIGHT = '/bookflight';
    const URL_CONTACTS = '/contacts';
    const URL_EDITPASSWORD = '/editPassword';
    const URL_EDITUSERNAME = '/editUsername';
    const URL_FLIGHTEVENTS = '/flightevents';
    const URL_FLIGHTPRICE = '/flightprice';
    const URL_FLIGHTSEARCH = '/flightsearch';
    const URL_HOME = '/home';
    const URL_INFO = '/info';
    const URL_LOGOUT = '/logout';
    const URL_MYFLIGHTS = '/myFlights';
    const URL_NEWS = '/news';
    const URL_PROFILE = '/profile';
    const URL_REGISTER = '/register';
    const URL_SUBSCRIBED = '/register/subscribed';
    const URL_ROOT = '/';
    const URL_SEARCH = '/search';
    const URL_WHOWEARE = '/chi-siamo';

    //Views
    const VIEW_BOOKFLIGHT = 'bookflight.bookflight';
    const VIEW_CONTACTS = 'contacts';
    const VIEW_FLIGHTPRICERESULT = 'welcome.flightpriceresult';
    const VIEW_HOME = 'home';
    const VIEW_NEWS = 'news';
    const VIEW_REGISTER = 'auth.registration';
    const VIEW_SUBSCRIBED = 'auth.registration.subscribed';
    const VIEW_WELCOME = 'welcome';
    const VIEW_WHOWEARE = 'whoweare';
}
?>