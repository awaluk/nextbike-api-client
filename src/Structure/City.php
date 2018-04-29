<?php

namespace awaluk\NextbikeClient\Structure;

use awaluk\NextbikeClient\Collection\StationCollection;

class City extends AbstractStructure
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

    public function getStationsAmount(): int
    {
        return $this->get('num_places');
    }

    public function getBookedBikesAmount(): int
    {
        return $this->get('booked_bikes');
    }

    public function getAllBikesAmount(): int
    {
        return $this->get('set_point_bikes');
    }

    public function getAvailableBikesAmount(): int
    {
        return $this->get('available_bikes');
    }

    public function getStationCollection(): StationCollection
    {
        return new StationCollection($this->get('places'));
    }
}
