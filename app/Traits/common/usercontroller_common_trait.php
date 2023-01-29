<?php

namespace App\Traits\Common;

use App\Classes\UserManager;
use App\Http\Requests\EditPasswordRequest;
use App\Http\Requests\EditUsernameRequest;
use App\Http\Requests\UserDeleteRequest;
use App\Interfaces\Constants as C;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

/**
 * This trait contains common code between UserController & UserControllerApi
 */
trait UserControllerCommonTrait{
    private UserManager $usermanager;
    private $auth_id;

    /**
     * Get user data by id
     */
    private function getDataCommon(){
        if(isset($this->auth_id))
            return $this->usermanager->getUser($this->auth_id);
        return null;
    }
}
?>