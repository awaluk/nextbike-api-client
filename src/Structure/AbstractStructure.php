<?php

namespace awaluk\NextbikeClient\Structure;

use awaluk\NextbikeClient\Exception\FieldNotExistException;
use stdClass;

abstract class AbstractStructure
{
    protected $data;

    public function __construct(stdClass $data)
    {
        $this->data = $data;
    }

    public function get(string $name)
    {
        if (!isset($this->data->$name)) {
            throw new FieldNotExistException($name);
        }

        return $this->data->$name;
    }

    public function has(string $name): bool
    {
        return isset($this->data->$name);
    }
}
