<?php

class ModelDuck extends Duck
{
    public function __construct()
    {
        parent::__construct(FlyNoWay(),MuteQuackBehavior(), NoDanceBehavior());
    }

    public function Display(): void
    {
        echo "I'm model duck\n";
    }
}