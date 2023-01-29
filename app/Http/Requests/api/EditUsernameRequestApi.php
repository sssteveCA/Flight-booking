<?php

namespace App\Http\Requests\api;

use App\Traits\Common\EditUsernameRequestCommonTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Constants as C;

class EditUsernameRequestApi extends FormRequest
{
    use EditUsernameRequestCommonTrait;
}
