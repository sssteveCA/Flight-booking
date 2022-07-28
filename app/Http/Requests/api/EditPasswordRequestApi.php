<?php

namespace App\Http\Requests\api;

use App\Traits\Common\EditPasswordRequestCommonTrait;
use Illuminate\Foundation\Http\FormRequest;

class EditPasswordRequestApi extends FormRequest
{
    use EditPasswordRequestCommonTrait;
}
