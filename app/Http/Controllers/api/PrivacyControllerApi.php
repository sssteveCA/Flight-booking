<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Traits\Common\PrivacyControllerCommonTrait;
use Illuminate\Http\Request;
use App\Interfaces\Paths as P;

class PrivacyControllerApi extends Controller
{
    use PrivacyControllerCommonTrait;

    public function getCookiePolicy(Request $request){
        return response()->json([
            'cookie' => $this->getCookiePolicyContent()
        ],200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }

    public function getPrivacyPolicy(Request $request){
        return response()->json([
            'privacy' => $this->getPrivacyPolicyContent()
        ],200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }

    public function getTermsAndConditions(Request $request){
        return response()->json([
            'terms' => $this->getTermsAndConditionsContent()
        ],200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }
}
