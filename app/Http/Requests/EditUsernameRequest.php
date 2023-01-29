<?php

namespace App\Http\Requests;

use App\Traits\Common\EditUsernameRequestCommonTrait;
use Illuminate\Foundation\Http\FormRequest;



class EditUsernameRequest extends FormRequest
{
    use EditUsernameRequestCommonTrait;

}
