<?php

class MillardDuck extends Duck
{
    public function __construct()
    {
        parent::__construct(FlyWithWings(), QuackBehavior(), DanceWaltz());
    }

    public function Display(): void
    {
        echo "I'm mallard duck\n";
    }
}