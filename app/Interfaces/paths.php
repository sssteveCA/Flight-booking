<?php

namespace App\Interfaces;

interface Paths{

    //Directories
    const DIR_IMG = '/img';
    const DIR_FLIGHT_EVENTS_IMG = Paths::DIR_IMG.'/flightevents';

    //Prefixes
    const PREFIX_BOOKCARRENTAL = 'bookcarrental';
    const PREFIX_BOOKFLIGHT = 'bookflight';
    const PREFIX_BOOKHOTEL = 'bookhotel';
    const PREFIX_FLIGHTEVENTS = 'flightevents';
    const PREFIX_NEWS = 'news';
    const PREFIX_PROFILE = 'profile';
    const PREFIX_MYFLIGHTS = 'myFlights';
    const PREFIX_MYHOTELS = 'myHotels';


    //Routes
    const ROUTE_BOOKCARRENTAL = 'bookcarrental';
    const ROUTE_BOOKFLIGHT = 'bookflight';
    const ROUTE_BOOKHOTEL = 'bookhotel';
    const ROUTE_CARRENTALPRICE = 'carrentalprice';
    const ROUTE_ERRORS = 'errors';
    const ROUTE_FLIGHTPRICE = 'flightprice';
    const ROUTE_FLIGHTPRICE_GET = 'flightprice_get';
    const ROUTE_HOTELPRICE = 'hotelprice';
    const ROUTE_HOTELPRICE_GET = 'hotelprice_get';
    const ROUTE_INFO = 'usercontroller.info';
    const ROUTE_DELETEACCOUNT = 'usercontroller.deleteaccount';
    const ROUTE_EDITUSERNAME = 'usercontroller.editusername';
    const ROUTE_EDITPASSWORD = 'usercontroller.editpassword';
    const ROUTE_FLIGHT_PAYPAL_CANCEL = 'paypal.flight.cancel';
    const ROUTE_FLIGHT_PAYPAL_RETURN = 'paypal.flight.return';
    const ROUTE_HOTEL_PAYPAL_CANCEL = 'paypal.hotel.cancel';
    const ROUTE_HOTEL_PAYPAL_RETURN = 'paypal.hotel.return';
    const ROUTE_RESUMEFLIGHT = 'resumeflight';
    const ROUTE_RESUMEHOTEL = 'resumehotel';
    const ROUTE_SENDEMAIL = 'sendemail';
    const ROUTE_VERIFICATIONNOTICE = 'verification.notice';
    const ROUTE_VERIFICATIONSEND = 'verification.send';
    const ROUTE_VERIFICATIONVERIFY = 'verification.verify';

    //URLs
    const URL_ABOUTUS = '/chi-siamo';
    const URL_AIRPORTS_AVAILABLE = '/airports';
    const URL_AIRPORTSEARCH = '/airportsearch';
    const URL_BOOKFLIGHT = '/bookflight';

    const URL_CARRENTALPRICE = '/carrentalprice';
    const URL_CARRENTALSEARCH = '/carrentalsearch';
    const URL_COMPANIESSEARCH = '/companieslist';
    const URL_CONTACTS = '/contacts';
    const URL_COOKIE_POLICY = '/cookie_policy';
    const URL_DELETEACCOUNT = '/deleteAccount';
    const URL_EDITPASSWORD = '/editPassword';
    const URL_EDITUSERNAME = '/editUsername';
    const URL_EMAILVERIFY = '/email/verify';
    const URL_ERRORS = '/errors';
    const URL_FLIGHTPRICE = '/flightprice';
    const URL_FLIGHTRESUME = '/flightresume';
    const URL_FLIGHTSEARCH = '/flightsearch';
    const URL_HOTELS_AVAILABLE = '/hotels';
    const URL_HOTELCITIES = '/hotelcities';
    const URL_HOTELCOUNTRIES = '/hotelcountries';
    const URL_HOTELINFO = '/hotelinfo';
    const URL_HOTELPRICE = '/hotelprice';
    const URL_HOTELRESUME = '/hotelresume';
    const URL_HOTELSEARCH = '/hotelsearch';
    const URL_HOME = '/home';
    const URL_INFO = '/info';
    const URL_LOGOUT = '/logout';
    const URL_MYFLIGHTS = '/myFlights';
    const URL_MYHOTELS = '/myHotels';
    const URL_NEWS = '/news';
    const URL_PAYPAL_CANCEL = '/cancel';
    const URL_PAYPAL_RETURN = '/return';
    const URL_PREFERENCES_SET = '/preferences_set';
    const URL_PRIVACY_POLICY = '/privacy_policy';
    const URL_PROFILE = '/profile';
    const URL_REGISTER = '/register';
    const URL_SUBSCRIBED = '/register/subscribed';
    const URL_ROOT = '/';
    const URL_SEARCH = '/search';
    const URL_SENDEMAIL = Paths::URL_CONTACTS.'/sendemail';
    const URL_TERMS = '/terms';
    const URL_VERIFICATION_NOTIFICATION = '/email/verification-notification';
    
    //Views
    const VIEW_ABOUTUS = 'aboutus';
    const VIEW_BACKBUTTON = 'partials.back';
    const VIEW_BOOKCARRENTAL = 'bookcarrental.bookcarrental';
    const VIEW_BOOKFLIGHT = 'bookflight.bookflight';
    const VIEW_BOOKHOTEL = 'bookhotel.bookhotel';
    const VIEW_CARRENTALLOGIN = 'include.carrentallogin';
    const VIEW_CARRENTALPRICERESULT = 'welcome.carrentalpriceresult';
    const VIEW_CONTACTS = 'contacts';
    const VIEW_COOKIE_POLICY = 'cookie_policy';
    const VIEW_EMAIL_CONTACTS = 'email.contacts';
    const VIEW_FALLBACK = 'error.errors';
    const VIEW_FOOTER = 'partials.footer';
    const VIEW_FLIGHT = 'profile.myFlights.flight';
    const VIEW_FLIGHTEVENT = 'flightevents.flightevent';
    const VIEW_FLIGHTLOGIN = 'include.flightlogin';
    const VIEW_FLIGHTPRICERESULT = 'welcome.flightpriceresult';
    const VIEW_HOME = 'home';
    const VIEW_HOTEL = 'profile.myHotels.hotel';
    const VIEW_HOTELLOGIN = 'include.hotellogin';
    const VIEW_HOTELPRICERESULT = 'welcome.hotelpriceresult';
    const VIEW_LOGIN = 'auth.login';
    const VIEW_MENU = 'layouts.menu';
    const VIEW_MENU_PRIVACY = 'partials.menu_privacy';
    const VIEW_MYFLIGHTS = 'profile.myFlights';
    const VIEW_MYHOTELS = 'profile.myHotels';
    const VIEW_NEWS = 'news';
    const VIEW_FLIGHT_PAYPAL_CANCEL = 'paypal.flight.cancel';
    const VIEW_FLIGHT_PAYPAL_RETURN = 'paypal.flight.return';
    const VIEW_HOTEL_PAYPAL_CANCEL = 'paypal.hotel.cancel';
    const VIEW_HOTEL_PAYPAL_RETURN = 'paypal.hotel.return';
    const VIEW_PAYPAL_DATA = 'partials.paypal.paypal_data';
    const VIEW_POST = 'news.post';
    const VIEW_POST_EMPTYLIST = 'partials.news.emptylist';
    const VIEW_POST_ITEM = 'partials.news.item';
    const VIEW_PRIVACY = 'partials.privacy';
    const VIEW_PRIVACY_POLICY = 'privacy_policy';
    const VIEW_PROFILE_EDIT = 'profile.edit';
    const VIEW_PROFILE_INFO = 'profile.info';
    const VIEW_PROFILE_INFO_DA = 'profile.info.deleteaccount';
    const VIEW_PROFILE_INFO_EPF = 'profile.info.editpasswordform';
    const VIEW_PROFILE_INFO_EUF = 'profile.info.editusernameform';
    const VIEW_PROFILE_INFO_SE = 'profile.info.showemail';
    const VIEW_REGISTER = 'auth.register';
    const VIEW_SUBSCRIBED = 'auth.registration.subscribed';
    const VIEW_TERMS = 'terms';
    const VIEW_VERIFYEMAIL = 'auth.verify';
    const VIEW_WELCOME = 'welcome';
    const VIEW_WELCOME_CAR_RENTAL = 'partials.welcome.carrental';
    const VIEW_WELCOME_FLIGHT = 'partials.welcome.flight';
    const VIEW_WELCOME_HOTEL = 'partials.welcome.hotel';
    
}
?>