<?php

namespace App\Http\Controllers\api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Traits\Common\RegisterControllerCommonTrait;

class RegisterControllerApi extends Controller
{
    //
    use RegistersUsers,RegisterControllerCommonTrait;
    
}
