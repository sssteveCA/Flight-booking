<?php

namespace App\Http\Requests\api;

use App\Traits\Common\EditPasswordRequestCommonTrait;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EditPasswordRequestApi extends FormRequest
{
    use EditPasswordRequestCommonTrait;
  
}
