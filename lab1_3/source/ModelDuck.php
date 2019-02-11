<?php

class ModelDuck extends Duck
{
    public function __construct()
    {
        parent::__construct(flyNoWay(), muteQuackBehavior(), noDanceBehavior());
    }

    public function display(): void
    {
        echo "I'm model duck\n";
    }
}