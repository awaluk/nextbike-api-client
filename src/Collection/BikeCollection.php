<?php

namespace awaluk\NextbikeClient\Collection;

use awaluk\NextbikeClient\Structure\Bike;

/**
 * @method Bike[] getAll()
 * @method null|Bike getFirst()
 */
class BikeCollection extends AbstractCollection
{
    protected $dataClass = Bike::class;
}
