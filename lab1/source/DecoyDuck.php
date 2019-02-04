<?php

class DecoyDuck extends Duck
{
    public function __construct()
    {
        parent::__construct(new FlyNoWay(), new MuteQuackBehavior(), new NoDance());
    }

    public function Display(): void
    {
        echo "I'm decoy duck\n";
    }
}