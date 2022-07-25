<?php

namespace App\Application\Service\Classes;

use App\Application\Dependencies\IO\InputInterface;
use App\Application\Dependencies\Validation\ValidationInterface;
use Spiral\Http\Exception\ClientException\BadRequestException;

class ValidationService
{
    public function __construct(private readonly ValidationInterface $validation)
    {
    }

    public function validateClass(InputInterface $input): void
    {
        $validator = $this->validation->validate(
            [
                'name' => $input->getJsonParam('name'),
                'startDate' => $input->getJsonParam('startDate'),
                'endDate' => $input->getJsonParam('endDate'),
                'capacity' => $input->getJsonParam('capacity'),
            ],
            [
                'name' => ['required', 'notEmpty', 'string'],
                'startDate' => ['required', 'datetime'],
                'endDate' => ['required', 'datetime'],
                'capacity' => ['required', 'int',],
            ],
        );

        if (!$validator->isValid()) {
            throw new BadRequestException($this->getPrettyPrintErrors($validator->getErrors()));
        }
    }

    private function getPrettyPrintErrors(array $errors): string
    {
        $result = '';
        /** @var string $error */
        foreach ($errors as $item => $error) {
            $result .= $item . ': ' . $error . ' ';
        }

        return rtrim($result);
    }
}
