<?php

class RubberDuck extends Duck
{
    public function __construct()
    {
        parent::__construct(new FlyNoWay(), new SqueakBehavior(), new NoDance());
    }

    public function Display(): void
    {
        echo "I'm rubber duck\n";
    }
}