<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
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
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function render($request, Throwable $exception)
    {
       

        // return $request->expectsJson()
        //     ? response()->json(['error'=> $exception->getMessage()])
        //     : response()->json(['error'=> $exception->getMessage()]);


        if ($exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {
            if($request->ajax()){
                return response()->json(['error'=> "$exception->getMessage()"]);
            }else{
                return redirect()->back()->with('permission',$exception->getMessage());
            }
        }

        if ($this->isHttpException($exception)) {
            if($request->ajax()){
                return response()->json(['error'=> "Invalid route!!!"]);
            }else{
                return redirect()->back()->with('permission',"Invalid route!!!");
            }
        }
        return parent::render($request, $exception);
    }
    public function register()
    {
        //
    }
}
