<?php

namespace Tests\Unit\Application\Service\Classes;

use PHPUnit\Framework\MockObject\MockObject;
use App\Application\Dependencies\IO\InputInterface;
use App\Application\Dependencies\Validation\ValidatedInterface;
use App\Application\Dependencies\Validation\ValidationInterface;
use App\Application\Service\Classes\ValidationService;
use PHPUnit\Framework\TestCase;
use DateTime;
use Spiral\Http\Exception\ClientException\BadRequestException;

class ValidationServiceTest extends TestCase
{
    public function testValidateClass()
    {
        $validation = $this->getValidationMock(true);
        $input = $this->getInputMock();

        $validationService = new ValidationService($validation);
        $validationService->validateClass($input);
        $this->assertTrue(true);
    }

    public function testValidateClassValidationFails()
    {
        $validation = $this->getValidationMock(false);
        $input = $this->getInputMock();

        $validationService = new ValidationService($validation);

        $this->expectException(BadRequestException::class);
        $validationService->validateClass($input);
    }

    public function getInputMock(): InputInterface|MockObject
    {
        $input = $this->createMock(InputInterface::class);
        $input->expects($this->exactly(4))->method('getJsonParam')->willReturnOnConsecutiveCalls(
            'test',
            (new DateTime())->format('Y-m-d\TH:i:sT'),
            (new DateTime())->format('Y-m-d\TH:i:sT'),
            1
        );
        return $input;
    }

    public function getValidationMock(bool $valid): ValidationInterface|MockObject
    {
        $validation = $this->createMock(ValidationInterface::class);
        $validated = $this->createMock(ValidatedInterface::class);
        $validated->expects($this->once())->method('isValid')->willReturn($valid);
        $validation->expects($this->once())->method('validate')->willReturn($validated);
        return $validation;
    }
}
