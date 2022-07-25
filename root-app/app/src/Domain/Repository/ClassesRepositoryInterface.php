<?php

namespace App\Domain\Repository;

use App\Domain\Entity\StoryClass;

interface ClassesRepositoryInterface
{
    public function save(StoryClass $getStoryClass): StoryClass;
}
