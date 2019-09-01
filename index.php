<?php
require_once("vendor/autoload.php");

use Service\ServiceBuilder;
use Service\Weather\Persister\File;
use Service\Weather\Persister\Stdout;
use Service\Weather\Provider\InMemory;
use Service\Weather\Provider\OpenWeatherMapOrg;
use Service\Weather\Storage\XmlStorage;

$ws = ServiceBuilder::getInstance()->makeWeather(
    OpenWeatherMapOrg::class,
    XmlStorage::class,
    File::class);

$ws->run();