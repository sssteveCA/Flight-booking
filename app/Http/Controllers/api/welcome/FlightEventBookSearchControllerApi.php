<?php

namespace App\Http\Controllers\api\welcome;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Common\FlightEventBookSearchControllerCommonTrait;
use Exception;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;

class FlightEventBookSearchControllerApi extends Controller
{
    use FlightEventBookSearchControllerCommonTrait;

}
