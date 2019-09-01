<?php


namespace Service\Weather\Storage;

use Service\Weather\IPersister;
use Service\Weather\IStorage;
use Service\Weather\IValue;
use Service\Weather\IValueCollection;

class JsonStorage implements IStorage
{
    protected $persister;

    public function __construct(IPersister $persister)
    {
        $this->persister = $persister;
    }

    public function store(IValueCollection $values)
    {
        $tmp = [];
        /** @var IValue $value */
        foreach($values->getValues() as $value) {
            $tmp[] = [
                $values->getDate(),
                $value->getTemperature(),
                $value->getWindDirection()
            ];
        }

        $this->persister->persist(json_encode($tmp));
    }
}