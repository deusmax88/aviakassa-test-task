<?php


namespace Service\Weather\Provider;

use Service\Weather\IProvider;
use Service\Weather\IValueCollection;
use Service\Weather\IWindDirection;
use Service\Weather\Value;
use Service\Weather\ValueCollection;

class InMemory implements IProvider
{
    public function getByDate(\DateTimeInterface $date): IValueCollection
    {
        return new ValueCollection($date, [
            new Value(10, IWindDirection::E),
            new Value(14, IWindDirection::SE)
        ]);
    }
}