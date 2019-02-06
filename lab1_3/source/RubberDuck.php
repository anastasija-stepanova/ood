<?php

class RubberDuck extends Duck
{
    public function __construct()
    {
        parent::__construct(FlyNoWay(),SqueakBehavior(), NoDanceBehavior());
    }

    public function Display(): void
    {
        echo "I'm rubber duck\n";
    }
}