<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller;

use App\Application\Feature\ClassesFeature;
use App\Infrastructure\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Spiral\Prototype\Traits\PrototypeTrait;

class ApiController
{
    use PrototypeTrait;

    public function __construct(private readonly ClassesFeature $classesFeature)
    {
    }

    public function index(): ResponseInterface
    {
        return JsonResponse::get($this->classesFeature->add()->jsonSerialize(), 200);
    }
}
