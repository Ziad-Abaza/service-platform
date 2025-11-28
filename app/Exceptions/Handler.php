<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Handler extends ExceptionHandler
{
    /**
     * Get the response for unauthenticated requests.
     */
    protected function unauthenticated($request, AuthenticationException $exception): Response
    {
        return redirect()->guest('/login');
    }
}
