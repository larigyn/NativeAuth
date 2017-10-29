<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
// use Illuminate\Http\Resources\Json\response;
// use Symfony\Component\HttpKernel\Tests\HttpCache\request;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

//or use this below
use Request;
use Response;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }

    /**
    * this has beed remove from the latest version(5.5) of laravel
    * if you want to look the php file 
    * its in the handler.php
    */
    protected function unauthenticated($request, AuthenticationException $exception)
    {

        $guard = array_get($exception->guards(), 0);

        switch ($guard) {
            case 'admin':
                $login = 'admin.login'; //this goes to the route
                break;

                case 'gcj':
                $login = 'gcj.login'; //this goes to the route
                break;

                default:
                $login = 'login'; //this goes to the route
                break;
            }
        
        return $request->expectsJson()
                    ? response()->json(['message' => $exception->getMessage()], 401)
                    : redirect()->guest(route('$login'));
        }
    }
