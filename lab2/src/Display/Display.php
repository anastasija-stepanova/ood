<?php

class Display implements ObserverInterface
{
    public function update(ObservableInterface $observable): void
    {
        echo "Current Temp " . $observable->getTemperature() . "\n";
        echo "Current Hum " . $observable->getHumidity() . "\n";
        echo "Current Pressure " . $observable->getPressure() . "\n";
        echo "----------------" . "\n";
    }
}