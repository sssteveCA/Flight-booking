<?php

namespace App\Interfaces;

interface Paths{

    //Prefixes
    const PREFIX_BOOKFLIGHT = 'bookflight';
    const PREFIX_NEWS = 'news';
    const PREFIX_PROFILE = 'profile';
    const PREFIX_MYFLIGHTS = 'myFlights';


    //Routes
    const ROUTE_BOOKFLIGHT = 'bookflight';
    const ROUTE_FLIGHTPRICE = 'flightprice';
    const ROUTE_FLIGHTPRICE_GET = 'flightprice_get';
    const ROUTE_INFO = 'infocontroller.info';
    const ROUTE_EDITUSERNAME = 'infocontroller.editusername';
    const ROUTE_EDITPASSWORD = 'infocontroller.editpassword';
    const ROUTE_PAYPAL_CANCEL = 'paypal.cancel';
    const ROUTE_PAYPAL_RETURN = 'paypal.return';
    const ROUTE_RESUMEFLIGHT = 'resumeflight';
    const ROUTE_VERIFICATIONNOTICE = 'verification.notice';
    const ROUTE_VERIFICATIONSEND = 'verification.send';
    const ROUTE_VERIFICATIONVERIFY = 'verification.verify';

    //URLs
    const URL_ABOUTUS = '/chi-siamo';
    const URL_AIRPORTSEARCH = '/airportsearch';
    const URL_BOOKFLIGHT = '/bookflight';
    const URL_BOOKFLIGHT_PAYPAL_CANCEL = '/cancel';
    const URL_BOOKFLIGHT_PAYPAL_RETURN = '/return';
    const URL_COMPANIESSEARCH = '/companieslist';
    const URL_CONTACTS = '/contacts';
    const URL_EDITPASSWORD = '/editPassword';
    const URL_EDITUSERNAME = '/editUsername';
    const URL_EMAILVERIFY = '/email/verify';
    const URL_FLIGHTEVENTS = '/flightevents';
    const URL_FLIGHTPRICE = '/flightprice';
    const URL_FLIGHTRESUME = Paths::URL_BOOKFLIGHT.'/flightresume';
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
    const URL_SENDEMAIL = Paths::URL_CONTACTS.'/sendemail';
    const URL_VERIFICATION_NOTIFICATION = '/email/verification-notification';
    
    //Views
    const VIEW_ABOUTUS = 'aboutus';
    const VIEW_BOOKFLIGHT = 'bookflight.bookflight';
    const VIEW_CONTACTS = 'contacts';
    const VIEW_FALLBACK = 'error.errors';
    const VIEW_FLIGHT = 'profile.myFlights.flight';
    const VIEW_FLIGHTLOGIN = 'include.flightlogin';
    const VIEW_FLIGHTPRICERESULT = 'welcome.flightpriceresult';
    const VIEW_HOME = 'home';
    const VIEW_MYFLIGHTS = 'profile.myFlights';
    const VIEW_NEWS = 'news';
    const VIEW_PAYPAL_CANCEL = 'paypal.cancel';
    const VIEW_PAYPAL_RETURN = 'paypal.return';
    const VIEW_POST = 'news.post';
    const VIEW_PROFILE_EDIT = 'profile.edit';
    const VIEW_REGISTER = 'auth.register';
    const VIEW_SUBSCRIBED = 'auth.registration.subscribed';
    const VIEW_VERIFYEMAIL = 'auth.verify';
    const VIEW_WELCOME = 'welcome';
    
}
?>