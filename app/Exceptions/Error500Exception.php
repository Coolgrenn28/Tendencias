<?php

namespace App\Exceptions;

use Exception;

class Error500Exception extends Exception
{
    public function render($request)
    {
        return response()->view('errors.500', [], 500);
    }
}