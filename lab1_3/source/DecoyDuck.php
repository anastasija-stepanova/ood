<?php

class DecoyDuck extends Duck
{
    public function __construct()
    {
        parent::__construct(FlyWithWings(), MuteQuackBehavior(), NoDanceBehavior());
    }

    public function Display(): void
    {
        echo "I'm decoy duck\n";
    }
}