<?php

namespace App\Http\Controllers;

use App\Traits\Common\PrivacyControllerCommonTrait;
use Illuminate\Http\Request;
use App\Interfaces\Paths as P;

class PrivacyController extends Controller
{
    use PrivacyControllerCommonTrait;

    public function getCookiePolicy(Request $request){
        return response()->view(P::URL_COOKIE_POLICY,[
            'cookie' => $this->getCookiePolicyContent()
        ]);
    }

    public function getPrivacyPolicy(Request $request){
        return response()->view(P::URL_PRIVACY_POLICY,[
            'privacy' => $this->getPrivacyPolicyContent()
        ]);
    }

    public function getTermsAndConditions(Request $request){
        return response()->view(P::URL_TERMS,[
            'terms' => $this->getTermsAndConditionsContent()
        ]);
    }
}
