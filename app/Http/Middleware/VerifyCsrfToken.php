<?php

namespace App\Http\Middleware;

use App\Interfaces\Paths as P;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;


class VerifyCsrfToken extends Middleware
{

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
        'paypal.com/*'
    ];
}
