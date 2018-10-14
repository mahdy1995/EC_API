<?php
namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait ExceptionTrait
{
    public function apiException($request,$exception){

        if ($this->isModel($exception))
        {
            return response()->json([
                'errors' => 'Product Model not found'
            ], Response::HTTP_NOT_FOUND);
        }
            if ($this->isHttp($exception))
            {
                return response()->json([
                    'errors' => 'Your URL is not valid'
                ], Response::HTTP_NOT_FOUND);
            }
                return parent::render($request, $exception);
    }



    public function isModel($exception) {
        return $exception instanceof ModelNotFoundException;
    }


    public function isHttp($exception) {
        return $exception instanceof NotFoundHttpException;
    }

}
