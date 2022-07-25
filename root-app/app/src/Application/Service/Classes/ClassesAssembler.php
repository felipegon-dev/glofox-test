<?php

namespace App\Application\Service\Classes;

use App\Application\Dependencies\IO\InputInterface;
use App\Domain\Entity\StoryClass;
use DateTime;

class ClassesAssembler
{
    public function __construct(
        private readonly InputInterface $input,
        private readonly ValidationService $validationService,
    ) {
    }

    public function getStoryClass(): StoryClass
    {
        $this->validationService->validateClass($this->input);

        return new StoryClass(
            (string) $this->input->getJsonParam('name'),
            new DateTime((string)$this->input->getJsonParam('startDate')),
            new DateTime((string)$this->input->getJsonParam('endDate')),
            (int) $this->input->getJsonParam('capacity')
        );
    }
}
