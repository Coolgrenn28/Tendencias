<?php

namespace App\Exceptions;

use Exception;

class Error403Exception extends Exception
{
    public function render($request)
    {
        return response()->view('errors.403', [], 403);
    }
}