<?php

class WeatherStation extends Observable
{
    /** @var float */
    private $temperature = 0.0;
    /** @var float */
    private $humidity = 0.0;
    /** @var float */
    private $pressure = 760.0;
    /** @var ObservableType */
    private $type;

    public function __construct(ObservableType $type)
    {
        parent::__construct($type);
        $this->type = $type;
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

    public function setMeasurements(float $temp, float $humidity, float $pressure)
    {
        $this->humidity = $humidity;
        $this->temperature = $temp;
        $this->pressure = $pressure;

        $this->measurementsChanged();
    }
}