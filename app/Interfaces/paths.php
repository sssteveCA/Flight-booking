<?php

namespace App\Interfaces;

interface Paths{

    //Prefixes
    const PREFIX_PROFILE = 'profile';

    //URLs
    const URL_AIRPORTSEARCH = '/welcome/airportsearch';
    const URL_CONTACTS = '/contacts';
    const URL_EDITPASSWORD = '/editPassword';
    const URL_EDITUSERNAME = '/editUsername';
    const URL_FLIGHTEVENTS = '/welcome/flightevents';
    const URL_FLIGHTPRICE = '/welcome/flightprice';
    const URL_FLIGHTSEARCH = '/welcome/flightsearch';
    const URL_HOME = '/home';
    const URL_LOGOUT = '/logout';
    const URL_NEWS = '/news';
    const URL_PROFILE = '/profile';
    const URL_ROOT = '/';
    const URL_SEARCH = '/search';
    const URL_WHOWEARE = '/chi-siamo';

    //Views
    const VIEW_CONTACTS = 'contacts';
    const VIEW_FLIGHTPRICERESULT = 'welcome/flightpriceresult';
    const VIEW_HOME = 'home';
    const VIEW_NEWS = 'news';
    const VIEW_WELCOME = 'welcome';
    const VIEW_WHOWEARE = 'whoweare';
}
?>