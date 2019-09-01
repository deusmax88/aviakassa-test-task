<?php
namespace Service\Weather;

interface IValueCollection
{
    public function getDate() : \DateTimeInterface;

    public function getValues() : array;
}