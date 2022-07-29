<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;
use App\Interfaces\Constants as C;
use Illuminate\Http\Request;


class EmailController extends Controller
{
    /**
     * Send email to website admin
     * 
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function sendEmail(EMailRequest $request){
        //Check if form data are valid
        $request_array = $request->validated();
        $response = [
            'done' => false,
            C::KEY_MESSAGE => '',
        ];
        $headers = [
            'From' => " \"{$request_array['name']}\" <{$request_array['email']}>",
            'Reply-To' => $request_array['email'],
            'X-Mailer' => 'PHP/'.phpversion(),
            'MIME-Version' => '1.0',
            'Content-Type' => 'text/plain; charset=UTF-8'
        ];
        $email = mail(C::EMAIL_ADMIN,$request_array['subject'],$request_array['message'],$headers);
        if($email){
            //Email successfully sent
            $response = [
                'done' => true,
                C::KEY_MESSAGE => C::OK_EMAILSEND
            ];
            $code = 200; //OK
        }//if($email){
        else{
            //Error while sending the email
            $response['msg'] = C::ERR_EMAILSEND;
            $code = 500; //Internal Server Error
        }
        return response()->json($response,$code,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }
}
