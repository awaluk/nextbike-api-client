<?php

namespace awaluk\NextbikeClient\Collection;

use awaluk\NextbikeClient\Structure\System;

/**
 * @method System[] getAll()
 * @method null|System getFirst()
 */
class SystemCollection extends AbstractCollection
{
    protected $dataClass = System::class;
}
