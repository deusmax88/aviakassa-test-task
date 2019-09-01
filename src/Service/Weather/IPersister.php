<?php


namespace Service\Weather;


interface IPersister
{
    public function persist($buffer);
}