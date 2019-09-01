<?php


namespace Service\Weather;

use Service\IService;

class Service implements IService
{
    protected $provider;

    protected $storage;

    public function __construct(IProvider $provider, IStorage $storage)
    {
        $this->provider = $provider;
        $this->storage = $storage;
    }

    public function run()
    {
        $values = $this->provider->getByDate(new \DateTime());
        $this->storage->store($values);
    }
}