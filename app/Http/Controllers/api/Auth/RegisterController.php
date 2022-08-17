<?php

namespace App\Http\Controllers\api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Constants;
use Dotenv\Util\Str;
use Illuminate\Support\Str as SupportStr;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    //
    use RegistersUsers;

    /**
     * Custom attributes array
     * 
     * @var array
     */
    private array $attributes = [
        'name' => 'nome utente',
        'email' => 'indirizzo email',
    ];

    /**
     * Validation error messages array
     * 
     * @var array
     */
    private array $messages = [
        'required' => 'Il campo :attribute è obbligatorio',
        'string' => 'Il campo :attribute deve essere una stringa',
        'email' => 'Il campo :attribute deve essere un indirizzo email',
        'max' => 'Il campo :attribute ha superato il numero massimo di caratteri consentiti',
        'min' => 'Il campo :attribute ha un numero di caratteri inferiore a quello richiesto',
        'confirmed' => 'La password inserita deve corrispondere al campo di conferma della password'
    ];

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],$this->messages,$this->attributes);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }


    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $response = array();
        $response['registered'] = false;
        Log::info("RegisterController register");
        //Log::info("RegisterController register request ".var_export($request->all(),true));
        try{
            $validator = $this->validator($request->all())->validate();
            event(new Registered($user = $this->create($request->all())));
            Log::info("RegisterController register new Registered");

            $this->guard()->login($user);

            if ($this->registered($request, $user)) {
                //Log::info("RegisterController register response ".var_export($response,true));
            }

            /*$response = $request->wantsJson()
                        ? new JsonResponse([], 201)
                        : redirect($this->redirectPath());*/
            $response['registered'] = true;
            $response['message'] = Constants::OK_REGISTRATION;
            //Log::info("RegisterController register wantsJson response ".var_export($response,true));
        }
        catch(ValidationException $ve){
            $response['errors'] = $ve->validator->errors()->first();
            Log::error("Validation Exception ".var_export($response['errors'],true));
        }
        return $response;
    }
}
