<?php

class FlyWithWings implements IFlyBehavior
{
    private $flightsCount = 0;

    public function Fly(): void
    {
        $this->flightsCount++;
        echo "I'm flying with wings\n";
        echo "This flight is " . $this->flightsCount . "\n";
    }
}