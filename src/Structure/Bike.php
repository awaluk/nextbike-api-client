<?php

namespace awaluk\NextbikeClient\Structure;

class Bike extends AbstractStructure
{
    public function getNumber(): int
    {
        return $this->get('number');
    }

    public function getBikeType(): int
    {
        return $this->get('bike_type');
    }

    public function getActive(): bool
    {
        return $this->get('active');
    }

    public function getState(): string
    {
        return $this->get('state');
    }

    public function getElectricLock(): bool
    {
        return $this->get('electric_lock');
    }

    public function getBoardComputer(): int
    {
        return $this->get('boardcomputer');
    }
}
