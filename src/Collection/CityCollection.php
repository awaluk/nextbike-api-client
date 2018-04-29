<?php

namespace awaluk\NextbikeClient\Collection;

use awaluk\NextbikeClient\Structure\City;

class CityCollection extends AbstractCollection
{
    /**
     * @return City[]
     */
    public function getAll(): array
    {
        $cities = [];

        foreach ($this->data as $city) {
            $cities[] = new City($city);
        }

        return $cities;
    }
}
