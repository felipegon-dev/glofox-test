<?php

namespace Tests\Unit\Application\Feature;

use App\Application\Feature\ClassesFeature;
use App\Application\Service\Classes\ClassesAssembler;
use App\Domain\Entity\StoryClass;
use App\Domain\Repository\ClassesRepositoryInterface;
use PHPUnit\Framework\TestCase;

class ClassesFeatureTest extends TestCase
{
    public function testAdd()
    {
        $assembler = $this->createMock(ClassesAssembler::class);
        $repo = $this->createMock(ClassesRepositoryInterface::class);
        $class = $this->createMock(StoryClass::class);

        $assembler->expects($this->once())->method('getStoryClass')->willReturn($class);
        $repo->expects($this->once())->method('save')->willReturn($class);

        $classesFeature = new ClassesFeature($assembler, $repo);
        $this->assertInstanceOf(StoryClass::class, $classesFeature->add());
    }
}
