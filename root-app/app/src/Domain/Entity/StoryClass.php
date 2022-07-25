<?php

namespace App\Domain\Entity;

use DateTime;
use JsonSerializable;

class StoryClass implements JsonSerializable
{
    /**
     * @param string $name
     * @param DateTime $startDate
     * @param DateTime $endDate
     * @param int $capacity
     */
    public function __construct(
        private readonly string $name,
        private readonly DateTime $startDate,
        private readonly DateTime $endDate,
        private readonly int $capacity
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStartDate(): DateTime
    {
        return $this->startDate;
    }

    public function getEndDate(): DateTime
    {
        return $this->endDate;
    }

    public function getCapacity(): int
    {
        return $this->capacity;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'name' => $this->name,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'capcity' => $this->capacity,
        ];
    }
}
