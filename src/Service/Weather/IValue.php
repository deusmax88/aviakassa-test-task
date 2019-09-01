<?php
namespace Service\Weather;

interface IValue
{
    public function getTemperature();

    public function getWindDirection();
}