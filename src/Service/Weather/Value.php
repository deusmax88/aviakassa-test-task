<?php


namespace Service\Weather;


class Value implements IValue
{
    protected $temperature;

    protected $windDirection;

    public function __construct($temperature, $windDirection)
    {
        $this->temperature = $temperature;
        $this->windDirection = $windDirection;
    }

    public function getTemperature()
    {
        return $this->temperature;
    }

    public function getWindDirection()
    {
        return $this->windDirection;
    }
}