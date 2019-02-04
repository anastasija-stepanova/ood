<?php

class RedheadDuck extends Duck
{
    public function __construct()
    {
        parent::__construct(new FlyWithWings(), new QuackBehavior(), new DanceMinuet());
    }

    public function Display(): void
    {
        echo "I'm redhead duck\n";
    }
}