<?php

class CDisplay implements IObserver
{
    public function update(SWeatherInfo $data): void
    {
        echo "Current Temp " . $data->temperature . "\n";
        echo "Current Hum " . $data->humidity . "\n";
        echo "Current Pressure " . $data->pressure . "\n";
        echo "----------------" . "\n";
    }
}