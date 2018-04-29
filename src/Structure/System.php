<?php

namespace awaluk\NextbikeClient\Structure;

use awaluk\NextbikeClient\Collection\CityCollection;

class System extends AbstractStructure
{
    public function getName(): string
    {
        return $this->get('name');
    }

    public function getLatitude(): float
    {
        return $this->get('lat');
    }

    public function getLongitude(): float
    {
        return $this->get('lng');
    }

    public function getHotline(): string
    {
        return $this->get('hotline');
    }

    public function getEmail(): string
    {
        return $this->get('email');
    }

    public function getTimezone(): string
    {
        return $this->get('timezone');
    }

    public function getCurrency(): string
    {
        return $this->get('currency');
    }

    public function getOperatorAddress(): string
    {
        return $this->get('system_operator_address');
    }

    public function getCountryCode(): string
    {
        return $this->get('country');
    }

    public function getCountryName(): string
    {
        return $this->get('country_name');
    }

    public function getTermsUrl(): string
    {
        return $this->get('terms');
    }

    public function getWebsiteUrl(): string
    {
        return $this->get('website');
    }

    public function getBookedBikesAmount(): int
    {
        return $this->get('booked_bikes');
    }

    public function getAllBikesAmount(): int
    {
        return $this->get('set_point_bikes');
    }

    public function getAvailableBikesAmount(): int
    {
        return $this->get('available_bikes');
    }

    public function getCityCollection(): CityCollection
    {
        return new CityCollection($this->get('cities'));
    }
}
