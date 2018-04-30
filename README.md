# Nextbike API Client

[![Build Status](https://travis-ci.org/awaluk/nextbike-api-client.svg?branch=master)](https://travis-ci.org/awaluk/nextbike-api-client)

Client to get some data from Nextbike API.

This library require **PHP version >= 7**.

## Usage

To use, please include Composer autoloader. Next, create HTTP client (based on [Guzzle](https://github.com/guzzle/guzzle)) and `Nextbike` class instance.

```php
<?php

require_once 'vendor/autoload.php';

use awaluk\NextbikeClient\HttpClient;
use awaluk\NextbikeClient\Nextbike;

$httpClient = new HttpClient();
$nextbike = new Nextbike($httpClient);
```

If it's necessary, you might pass custom API address in second parameter of `Nextbike` class:

```php
$nextbike = new Nextbike($httpClient, 'https://example.com');
```

### Methods

`Nextbike` class provide methods to get data from API. In results you receive **structure (one object)** or **collection (more objects)**.

Method | Description | Result
--- | --- | ---
`getSystems()` | get all Nextbike systems | `SystemCollection`
`getCities()` | get all cities from all systems | `CityCollection`
`getCity(int $cityId)` | get one city by passed id | `City`

### Structure

Each structure provides own methods to get data. For details, please see to [necessary class](https://github.com/awaluk/nextbike-api-client/tree/master/src/Structure). In addition, each structure have method `get(string $name)` to get data by given name.

### Collection

In [collections](https://github.com/awaluk/nextbike-api-client/tree/master/src/Collection) you might use following methods:

Method | Description | Result
--- | --- | ---
`isEmpty()` | check is structure have any data | _bool_
`count()` | get number of objects in collection | _int_
`getAll()` | get all data | _array_
`getFirst()` | get first object | _structure class_

## Examples

1. Get all systems names:

```php
<?php

$httpClient = new HttpClient();
$nextbike = new Nextbike($httpClient);
$systems = $nextbike->getSystems()->getAll();

foreach ($systems as $system) {
    echo $system->getName() . ', ';
}
```

2. Get stations with number of available bikes in given city (in this example: 496 - __Koszalin, Poland__):

```php
<?php

$httpClient = new HttpClient();
$nextbike = new Nextbike($httpClient);
$city = $nextbike->getCity(496);

foreach ($city->getStationCollection()->getAll() as $station) {
    echo 'Station: ' . $station->getName() . ' - available bikes: ' . $station->getBikesAmount() . ', ';
}
```

## Contributing rules

Do you want to help develop this library? See [CONTRIBUTING file](https://github.com/awaluk/nextbike-api-client/blob/master/CONTRIBUTING.md).

## License

[MIT](https://github.com/awaluk/nextbike-api-client/blob/master/LICENSE)
