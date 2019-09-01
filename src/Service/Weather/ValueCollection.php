<?php


namespace Service\Weather;


class ValueCollection implements IValueCollection
{
    protected $date;

    protected $values;

    public function __construct(\DateTimeInterface $date, $values = null)
    {
        $this->date = $date;
        $this->values = $values;
    }

    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    public function getValues(): array
    {
        return $this->values;
    }

    public function appendValue(IValue $value){
        $this->values[] = $value;
    }
}