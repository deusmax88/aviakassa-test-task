<?php
namespace Service;

use Service\Weather\Persister\File;
use Service\Weather\Storage\JsonStorage;
use Service\Weather\Storage\XmlStorage;

class ServiceBuilder
{
    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function makeWeather($providerName, $storageName, $persisterName) : IService
    {
        $provider = new $providerName();

        $persister = new $persisterName();

        if ($persisterName == File::class) {
            if ($storageName == XmlStorage::class) {
                $persister->setFileName("weather.xml");
            }
            elseif ($storageName == JsonStorage::class) {
                $persister->setFileName("weaher.json");
            }
        }

        $storage = new $storageName($persister);

        return new Weather\Service($provider, $storage);
    }
}