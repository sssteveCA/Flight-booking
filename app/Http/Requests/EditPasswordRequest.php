<?php

namespace App\Http\Requests;

use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use App\Traits\Common\EditPasswordRequestCommonTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class EditPasswordRequest extends FormRequest
{
    use EditPasswordRequestCommonTrait;

}
