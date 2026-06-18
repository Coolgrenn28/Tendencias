<?php

namespace App\Exceptions;

use Exception;

class Error404Exception extends Exception
{
    public function render($request)
    {
        return response()->view('errors.404', [], 404);
    }
}