<?php

class WeatherStation extends Observable
{
    /** @var float */
    private $temperature = 0.0;
    /** @var float */
    private $humidity = 0.0;
    /** @var float */
    private $pressure = 760.0;
    /** @var Wind */
    private $wind;

    public function __construct()
    {
        $this->wind  = new Wind();
    }

    public function getWind(): Wind
    {
        return $this->wind;
    }

    public function getTemperature(): float
    {
        return $this->temperature;
    }

    public function getHumidity(): float
    {
        return $this->humidity;
    }

    public function getPressure(): float
    {
        return $this->pressure;
    }

    public function measurementsChanged(): void
    {
        $this->notifyObservers();
    }

    public function setMeasurements(float $temp, float $humidity, float $pressure, Wind $wind)
    {
        $this->humidity = $humidity;
        $this->temperature = $temp;
        $this->pressure = $pressure;
        $this->wind = $wind;

        $this->measurementsChanged();
    }
}