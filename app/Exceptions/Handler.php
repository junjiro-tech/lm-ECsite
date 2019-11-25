<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;


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
     * * 認証していない場合にガードを見てそれぞれのログインページへ飛ばず
     * Convert an authentication exception into an unauthenticated response. 認証例外を非認証応答に変換します
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception 訳)例外
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)  //unauthenticated 訳)未認証
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401); //->json=json形式で返す
        }
        if (in_array('admin', $exception->guards(), true)) {
            return redirect()->guest(route('admin.login'));
        }
        
    return redirect()->guest(route('login'));
    }
    
}
