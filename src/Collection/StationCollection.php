<?php

namespace awaluk\NextbikeClient\Collection;

use awaluk\NextbikeClient\Structure\Station;

class StationCollection extends AbstractCollection
{
    /**
     * @return Station[]
     */
    public function getAll(): array
    {
        $stations = [];

        foreach ($this->data as $station) {
            $stations[] = new Station($station);
        }

        return $stations;
    }
}
