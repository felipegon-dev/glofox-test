<?php

namespace App\Application\Feature;

use App\Application\Service\Classes\ClassesAssembler;
use App\Domain\Entity\StoryClass;
use App\Domain\Repository\ClassesRepositoryInterface;

class ClassesFeature
{
    public function __construct(
        private readonly ClassesAssembler $classesAssembler,
        private readonly ClassesRepositoryInterface $classesRepo
    ) {
    }

    public function add(): StoryClass
    {
        return $this->classesRepo->save($this->classesAssembler->getStoryClass());
    }
}
