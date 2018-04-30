<?php

namespace awaluk\NextbikeClient\Collection;

use LogicException;

abstract class AbstractCollection
{
    protected $originalData;
    protected $dataClass;
    protected $data = [];

    public function __construct(array $data)
    {
        $this->originalData = $data;

        $this->parseData();
    }

    public function isEmpty(): bool
    {
        return empty($this->data);
    }

    public function count(): int
    {
        return count($this->data);
    }

    public function getAll(): array
    {
        return $this->data;
    }

    public function getFirst()
    {
        return $this->data[0] ?? null;
    }

    protected function parseData()
    {
        if (empty($this->dataClass)) {
            throw new LogicException('Collection must have not empty data class');
        }

        foreach ($this->originalData as $data) {
            $this->data[] = new $this->dataClass($data);
        }
    }
}
