<?php

namespace App\Infrastructure\Validator;

use App\Application\Dependencies\Validation\ValidatedInterface;
use App\Application\Dependencies\Validation\ValidationInterface;
use Spiral\Validation\ValidatorInterface;

class Validator implements ValidationInterface
{
    public function __construct(private readonly \Spiral\Validation\ValidationInterface $validation)
    {
    }

    public function validate(array $keys, array $values): ValidatedInterface
    {
        $validated = $this->validation->validate($keys, $values);

        return new class ($validated) implements ValidatedInterface {
            public function __construct(private readonly ValidatorInterface $validated)
            {
            }

            public function isValid(): bool
            {
                return $this->validated->isValid();
            }

            public function getErrors(): array
            {
                return $this->validated->getErrors();
            }
        };
    }
}
