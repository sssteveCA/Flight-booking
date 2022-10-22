<?php

namespace App\Http\Controllers\api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;

class LogoutControllerApi extends Controller
{
    /**
     * Revoke user tokens and logout
     */
    public function logout(Request $request){
        $user = Auth::user()->token();
        $user->revoke();
        $tokens = $user->tokens->pluck('id');
        Token::whereIn('id',$tokens)->update(['revoked' => true]);
        RefreshToken::whereIn('access_token_id', $tokens)->update(['revoked' => true]);
        return response()->json([
            'done' => true,
            'msg' => 'Non sei più autenticato'
        ],200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }
}
