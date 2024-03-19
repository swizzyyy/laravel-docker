<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class GeneralException extends Exception
{
    public function render($request)
    {
        return new JsonResponse([
            'errors' => [
                'message', $this->getMessage(),
            ]
        ], $this->code);
    }
}
