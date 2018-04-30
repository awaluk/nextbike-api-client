<?php

namespace awaluk\NextbikeClient\Parser;

use awaluk\NextbikeClient\Collection\CityCollection;
use awaluk\NextbikeClient\Collection\SystemCollection;

class AllCities
{
    private $systems;

    public function __construct(SystemCollection $systems)
    {
        $this->systems = $systems;
    }

    public function parse(): CityCollection
    {
        $allCities = [];

        foreach ($this->systems->getAll() as $system) {
            $cities = $system->getCityCollection();

            foreach ($cities->getAll() as $city) {
                $allCities[] = $city;
            }
        }

        return new CityCollection($allCities, false);
    }
}
