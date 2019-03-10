<?php

class StatsDisplay implements ObserverInterface
{
    private $statTemp;
    private $statHumidity;
    private $statPressure;
    private $statWindSpeed;
    private $statWindDirection;

    public function __construct()
    {
        $this->statTemp = new IndicatorCalculator();
        $this->statHumidity = new IndicatorCalculator();
        $this->statPressure = new IndicatorCalculator();
        $this->statWindSpeed = new IndicatorCalculator();
        $this->statWindDirection = new IndicatorCalculator();
    }

    public function update(ObservableInterface $observable): void
    {
        foreach ($observable->getDevelopments() as $development) {
            switch ($development) {
                case "Temperature":
                    echo "Temperature info:\n";
                    $this->statTemp->updateIndicator($observable->getTemperature());
                    $this->printIndicatorStatistics($this->statTemp);
                    break;
                case "Humidity":
                    echo "Humidity info:\n";
                    $this->statHumidity->updateIndicator($observable->getHumidity());
                    $this->printIndicatorStatistics($this->statHumidity);
                    break;
                case "Pressure":
                    echo "Pressure info:\n";
                    $this->statPressure->updateIndicator($observable->getPressure());
                    $this->printIndicatorStatistics($this->statPressure);
                    break;
                case "Wind speed ":
                    echo "Wind speed info:\n";
                    $this->statWindSpeed->updateIndicator($observable->getWind()->speed);
                    $this->printIndicatorStatistics($this->statWindSpeed);
                    break;
                case "Wind direction":
                    echo "Wind direction info:\n";
                    $this->statWindDirection->updateIndicator($observable->getWind());
                    $this->printIndicatorStatistics($this->statWindDirection);
                    break;
            }
        }
    }


    private function printIndicatorStatistics($indicator): void
    {
        $max = ($this->checkIndicatorValue($indicator->getMax()));
        $min = ($this->checkIndicatorValue($indicator->getMin()));
        $average = ($this->checkIndicatorValue($indicator->getAverage()));

        echo "Max " . round($max, 3) . "\n";
        echo "Min " . round($min, 3) . "\n";
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