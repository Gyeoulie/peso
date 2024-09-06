<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    // /**
    //  * Render the exception into an HTTP response.
    //  *
    //  * @param \Illuminate\Http\Request $request
    //  * @param \Throwable $exception
    //  * @return \Illuminate\Http\Response
    //  */
    // public function render($request, Throwable $exception)
    // {
    //     // Handle 404 errors
    //     if ($exception instanceof NotFoundHttpException) {
    //         return response()->view('error.404', [], 404);
    //     }

    //     // Handle other types of exceptions
    //     return response()->view('error.404', [], 404);
    // }
}
