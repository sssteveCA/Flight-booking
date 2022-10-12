<?php

namespace App\Traits\Common;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * This trait is used for common code between RegisterController & RegisterControllerApi
 */
trait RegisterControllerCommonTrait{

    /**
     * Custom attributes array
     * 
     * @var array
     */
    private array $attributes = [
        'name' => 'nome utente',
        'email' => 'indirizzo email',
        'password' => 'password',
        'password_confirmation' => 'conferma password'
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
        'max' => 'Il campo :attribute ha  più catatteri di :max',
        'min' => 'Il campo :attribute ha meno caratteri di :min',
        'confirmed' => 'La password inserita deve corrispondere al campo di conferma della password'
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function registered(Request $request, $user)
    {
        return true;
    } 

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

}

?>