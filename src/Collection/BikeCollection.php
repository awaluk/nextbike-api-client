<?php

namespace awaluk\NextbikeClient\Collection;

use awaluk\NextbikeClient\Structure\Bike;

class BikeCollection extends AbstractCollection
{
    /**
     * @return Bike[]
     */
    public function getAll(): array
    {
        $bikes = [];

        foreach ($this->data as $bike) {
            $bikes[] = new Bike($bike);
        }

        return $bikes;
    }
}
