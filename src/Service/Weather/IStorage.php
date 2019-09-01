<?php


namespace Service\Weather;


interface IStorage
{
    public function store(IValueCollection $values);
}