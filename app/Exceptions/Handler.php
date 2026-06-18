<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    public function register(): void
    {
        $this->renderable(function (Throwable $e, $request) {

            if ($e instanceof Error404Exception) {
                return $e->render($request);
            }

            if ($e instanceof Error403Exception) {
                return $e->render($request);
            }

            if ($e instanceof Error419Exception) {
                return $e->render($request);
            }

            if ($e instanceof Error500Exception) {
                return $e->render($request);
            }

        });
    }
}