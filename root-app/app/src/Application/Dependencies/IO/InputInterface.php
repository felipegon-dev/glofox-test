<?php

namespace App\Application\Dependencies\IO;

interface InputInterface
{
    public function getJsonParam(string $param): mixed;
}
