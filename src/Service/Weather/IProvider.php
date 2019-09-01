<?php
namespace Service\Weather;

interface IProvider
{
    public function getByDate(\DateTimeInterface $date) : IValueCollection;
}