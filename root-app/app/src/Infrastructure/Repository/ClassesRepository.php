<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\StoryClass;
use App\Domain\Repository\ClassesRepositoryInterface;

class ClassesRepository implements ClassesRepositoryInterface
{
    public function save(StoryClass $getStoryClass): StoryClass
    {
        // TODO: write into db
        return $getStoryClass;
    }
}
