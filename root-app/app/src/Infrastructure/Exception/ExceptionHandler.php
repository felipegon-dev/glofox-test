<?php

namespace App\Infrastructure\Exception;

use App\Infrastructure\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Spiral\Http\ErrorHandler\RendererInterface;

class ExceptionHandler implements RendererInterface
{
    public function renderException(Request $request, int $code, string $message): Response
    {
        return JsonResponse::get([
            'response' => [
                'message' => $message,
                'code' => $code,
            ]
        ], $code);
    }
}
