<?php
namespace Service\Weather\Provider;

use Service\Weather\IProvider;
use Service\Weather\IValueCollection;
use Service\Weather\IWindDirection;
use Service\Weather\Value;
use Service\Weather\ValueCollection;

class OpenWeatherMapOrg implements IProvider
{
    public function getByDate(\DateTimeInterface $date): IValueCollection
    {
        $response = file_get_contents("https://samples.openweathermap.org/data/2.5/forecast?id=1486209&appid=b1b15e88fa797225412429c1c50c122a1", false);
        $responseJson = json_decode($response);

        $collection = new ValueCollection($date);
        foreach($responseJson->list as $item) {
            $temperature = $item->main->temp;
            $windDirection = $this->getWindDirection($item->wind->deg);
            $value = new Value($temperature, $windDirection);
            $collection->appendValue($value);
        }

        return $collection;
    }

    protected function getWindDirection($degree)
    {
        if ($degree <= 22.5){
            return IWindDirection::N;
        }
        elseif ($degree > 22.5 && $degree <= 67.5) {
            return IWindDirection::NW;
        }
        elseif ($degree > 67.5 && $degree <= 112.5) {
            return IWindDirection::W;
        }
        elseif ($degree > 112.5 && $degree <= 157.5) {
            return IWindDirection::SW;
        }
        elseif ($degree > 157.5 && $degree <= 202.5) {
           return IWindDirection::S;
        }
        elseif ($degree > 202.5 && $degree <= 247.5) {
            return IWindDirection::SE;
        }
        elseif ($degree > 247.5 && $degree <= 292.5) {
            return IWindDirection::E;
        }
        elseif ($degree > 292.5 && $degree <= 337.5) {
            return IWindDirection::NE;
        }
        elseif ($degree > 337.5) {
            return IWindDirection::N;
        }
    }
}