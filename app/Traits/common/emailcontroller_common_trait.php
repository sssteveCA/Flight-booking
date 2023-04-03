<?php

namespace App\Traits\Common;

use App\Http\Requests\EmailRequest;
use App\Interfaces\Constants as C;
use App\Mail\ContactMail;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

/**
 * This trait contains common code of EmailController & EmailControllerApi
 */
trait EmailControllerCommonTrait{

    /**
     * Send email to website admin
     * 
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendEmail(EmailRequest $request){
        //Check if form data are valid
        $request_array = $request->validated();
        $response = [
            C::KEY_DONE => false,
            C::KEY_MESSAGE => '',
        ];
        try{
            Mail::to(env('MAIL_ADMIN'))->send(new ContactMail($request_array));
            $response = [
                C::KEY_DONE => true,
                C::KEY_STATUS => 'OK',
                C::KEY_MESSAGE => C::OK_EMAILSEND
            ];
            $code = 200; //OK
        }catch(Exception $e){
            //Log::channel('stdout')->info("EmailControllerCommonTrait sendEmail exception ".$e->getMessage());
            $response[C::KEY_MESSAGE] = C::ERR_EMAILSEND;
            $code = 500; //Internal Server Error
        }
        return response()->json($response,$code,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }
}
?>