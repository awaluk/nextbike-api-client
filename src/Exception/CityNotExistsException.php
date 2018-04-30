<?php

namespace awaluk\NextbikeClient\Exception;

use Exception;

class CityNotExistsException extends Exception
{
    public function __construct(int $cityId)
    {
        $message = 'City with ID "' . $cityId . '" not exists';

        parent::__construct($message);
    }
}
