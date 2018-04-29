<?php

namespace awaluk\NextbikeClient\Structure;

class Station extends AbstractStructure
{
    public function getId(): int
    {
        return $this->get('uid');
    }

    public function getName(): string
    {
        return $this->get('name');
    }

    public function getLatitude(): float
    {
        return $this->get('lat');
    }

    public function getLongitude(): float
    {
        return $this->get('lng');
    }

    public function getNumber(): int
    {
        return $this->get('number');
    }

    public function getAddress(): string
    {
        return $this->get('address');
    }

    public function getBikesAmount(): int
    {
        return $this->get('bikes');
    }

    public function getBikesNumbers(): string
    {
        return $this->get('bike_numbers');
    }

    public function getBikeRacksAmount(): int
    {
        return $this->get('bike_racks');
    }

    public function getFreeBikeRacksAmount(): int
    {
        return $this->get('free_racks');
    }

    public function getMaintenance(): bool
    {
        return $this->get('maintenance');
    }

    public function getTerminalType(): string
    {
        return $this->get('terminal_type');
    }
}
