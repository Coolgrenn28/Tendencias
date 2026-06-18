<?php

namespace App\Exceptions;

use Exception;

class Error419Exception extends Exception
{
    public function render($request)
    {
        return response()->view('errors.419', [], 419);
    }
}