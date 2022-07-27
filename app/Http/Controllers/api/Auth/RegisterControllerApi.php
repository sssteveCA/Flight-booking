<?php

namespace App\Http\Controllers\api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterControllerApi extends Controller
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
        'password' => 'password',
        'password_confirm' => 'conferma password'
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
}
