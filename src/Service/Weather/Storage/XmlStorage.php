<?php


namespace Service\Weather\Storage;


use Service\Weather\IPersister;
use Service\Weather\IStorage;
use Service\Weather\IValue;
use Service\Weather\IValueCollection;

class XmlStorage implements IStorage
{
    protected $persister;

    public function __construct(IPersister $persister)
    {
        $this->persister = $persister;
    }

    public function store(IValueCollection $values)
    {
        $tmp = "<?xml version='1.0' encoding='utf-8'?><values>";

        /** @var IValue $value */
        foreach($values->getValues() as $value) {
            $tmp .= "<value>".
                "<date>".$values->getDate()->format("Y-m-d H:i:s")."</date>".
                "<windDirection>".$value->getWindDirection()."</windDirection>".
                "<temperature>".$value->getTemperature()."</temperature>".
            "</value>";
        }

        $tmp .= "</values>";

        $this->persister->persist($tmp);
    }
}