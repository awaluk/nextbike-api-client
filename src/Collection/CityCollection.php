<?php

namespace awaluk\NextbikeClient\Collection;

use awaluk\NextbikeClient\Structure\City;

/**
 * @method City[] getAll()
 * @method null|City getFirst()
 */
class CityCollection extends AbstractCollection
{
    protected $dataClass = City::class;
}
