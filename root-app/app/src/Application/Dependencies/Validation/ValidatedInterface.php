<?php

namespace App\Application\Dependencies\Validation;

interface ValidatedInterface
{
    public function isValid(): bool;
    public function getErrors(): array;
}
