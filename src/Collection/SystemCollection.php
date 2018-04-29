<?php

namespace awaluk\NextbikeClient\Collection;

use awaluk\NextbikeClient\Structure\System;

class SystemCollection extends AbstractCollection
{
    /**
     * @return System[]
     */
    public function getAll(): array
    {
        $systems = [];

        foreach ($this->data as $system) {
            $systems[] = new System($system);
        }

        return $systems;
    }
}
