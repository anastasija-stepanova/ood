<?php

class Display implements ObserverInterface
{
    public function update(WeatherInfo $data): void
    {
        echo "Current Temp " . $data->temperature . "\n";
        echo "Current Hum " . $data->humidity . "\n";
        echo "Current Pressure " . $data->pressure . "\n";
        echo "----------------" . "\n";
    }
}