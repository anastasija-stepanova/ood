<?php

class StatsDisplay implements ObserverInterface
{
    private $statTemp;
    private $statHumidity;
    private $statPressure;

    public function __construct()
    {
        $this->statTemp = new IndicatorCalculator();
        $this->statHumidity = new IndicatorCalculator();
        $this->statPressure = new IndicatorCalculator();
    }

    public function update(WeatherInfo $data): void
    {
        echo "Temperature info:\n";
        $this->statTemp->updateIndicator($data->temperature);
        echo "Humidity info:\n";
        $this->statHumidity->updateIndicator($data->humidity);
        echo "Pressure info:\n";
        $this->statPressure->updateIndicator($data->pressure);
    }
}