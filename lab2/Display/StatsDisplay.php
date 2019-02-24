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
        $this->printIndicatorStatistics($this->statTemp);
        echo "Humidity info:\n";
        $this->statHumidity->updateIndicator($data->humidity);
        $this->printIndicatorStatistics($this->statHumidity);
        echo "Pressure info:\n";
        $this->statPressure->updateIndicator($data->pressure);
        $this->printIndicatorStatistics($this->statPressure);
    }

    private function printIndicatorStatistics($indicator): void
    {
        $max = ($this->checkIndicatorValue($indicator->getMax()));
        $min = ($this->checkIndicatorValue($indicator->getMin()));
        $average = ($this->checkIndicatorValue($indicator->getAverage()));

        echo "Max " . round($max, 3) . "\n";
        echo "Min " . round($min, 3)  . "\n";
        echo "Average " . round($average, 3) . "\n";
        echo "----------------" . "\n";
    }

    private function checkIndicatorValue($indicator): float
    {
        $indicatorType = gettype($indicator);
        $value = ($indicatorType == "double") ? $indicator : 0;
        return $value;
    }
}