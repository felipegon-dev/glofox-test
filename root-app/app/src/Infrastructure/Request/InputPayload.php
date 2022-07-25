<?php

namespace App\Infrastructure\Request;

use App\Application\Dependencies\IO\InputInterface;
use Spiral\Prototype\Traits\PrototypeTrait;

class InputPayload implements InputInterface
{
    use PrototypeTrait;

    public function getJsonParam(string $param): mixed
    {
        return $this->input->data($param);
    }
}
