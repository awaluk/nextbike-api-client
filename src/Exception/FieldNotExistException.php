<?php

namespace awaluk\NextbikeClient\Exception;

use Exception;

class FieldNotExistException extends Exception
{
    public function __construct(string $fieldName)
    {
        $message = 'Field "' . $fieldName . '" not exists';

        parent::__construct($message);
    }
}
