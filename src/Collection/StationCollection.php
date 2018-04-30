<?php

namespace awaluk\NextbikeClient\Collection;

use awaluk\NextbikeClient\Structure\Station;

/**
 * @method Station[] getAll()
 */
class StationCollection extends AbstractCollection
{
    protected $dataClass = Station::class;
}
