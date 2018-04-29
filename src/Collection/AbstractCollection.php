<?php

namespace awaluk\NextbikeClient\Collection;

abstract class AbstractCollection
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function isEmpty(): bool
    {
        return empty($this->data);
    }

    public function count(): int
    {
        return count($this->data);
    }

    abstract public function getAll(): array;
}
