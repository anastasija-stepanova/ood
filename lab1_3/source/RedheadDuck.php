<?php

class RedheadDuck extends Duck
{
    public function __construct()
    {
        parent::__construct(FlyWithWings(),QuackBehavior(), DanceMinuet());
    }

    public function Display(): void
    {
        echo "I'm redhead duck\n";
    }
}