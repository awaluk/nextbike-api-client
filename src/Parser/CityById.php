<?php

namespace awaluk\NextbikeClient\Parser;

use awaluk\NextbikeClient\Collection\SystemCollection;
use awaluk\NextbikeClient\Exception\CityNotExistsException;
use awaluk\NextbikeClient\Structure\City;

class CityById
{
    private $systems;
    private $cityId;

    public function __construct(SystemCollection $systems, int $cityId)
    {
        $this->systems = $systems;
        $this->cityId = $cityId;
    }

    public function parse(): City
    {
        $city = null;

        foreach ($this->systems->getAll() as $system) {
            $cities = $system->getCityCollection();

            if (!empty($cities->getAll())) {
                $city = $cities->getFirst();

                break;
            }
        }

        if (empty($city)) {
            throw new CityNotExistsException($this->cityId);
        }

        return $city;
    }
}
