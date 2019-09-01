<?php

namespace Service\Weather\Persister;

use Service\Weather\IPersister;

class Stdout implements IPersister
{
    public function persist($buffer)
    {
        var_dump($buffer);
    }
}