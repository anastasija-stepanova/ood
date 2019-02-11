<?php

class MillardDuck extends Duck
{
    public function __construct()
    {
        parent::__construct(new FlyWithWings(), new QuackBehavior(), new DanceWaltz());
    }

    public function display(): void
    {
        echo "I'm mallard duck\n";
    }
}