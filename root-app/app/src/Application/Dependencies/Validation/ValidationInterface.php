<?php

namespace App\Application\Dependencies\Validation;

interface ValidationInterface
{
    public function validate(array $keys, array $values): ValidatedInterface;
}
