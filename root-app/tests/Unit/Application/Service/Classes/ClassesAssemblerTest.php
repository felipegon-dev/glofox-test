<?php

namespace Tests\Unit\Application\Service\Classes;

use App\Application\Dependencies\IO\InputInterface;
use App\Application\Service\Classes\ClassesAssembler;
use App\Application\Service\Classes\ValidationService;
use App\Domain\Entity\StoryClass;
use PHPUnit\Framework\TestCase;
use DateTime;

class ClassesAssemblerTest extends TestCase
{
    public function testGetStoryClass()
    {
        $input = $this->createMock(InputInterface::class);
        $validation = $this->createMock(ValidationService::class);

        $validation->expects($this->once())->method('validateClass');
        $input->expects($this->exactly(4))->method('getJsonParam')->willReturnOnConsecutiveCalls(
            'test',
            (new DateTime())->format('Y-m-d\TH:i:sT'),
            (new DateTime())->format('Y-m-d\TH:i:sT'),
            1
        );

        $assembler = new ClassesAssembler($input, $validation);
        $this->assertInstanceOf(StoryClass::class, $assembler->getStoryClass());
    }
}
