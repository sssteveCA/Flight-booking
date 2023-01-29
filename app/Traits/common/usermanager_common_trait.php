<?php

namespace App\Traits\Common;

use App\Models\User;

trait UserManagerCommonTrait{

    /**
     * Get Authenticated user info
     */
    public function getUser(){
        $user = null;
        if(isset($this->auth_id)){
          $user = User::find($this->auth_id);
        }
        return $user;
    }
}
?>