<?php

class RubberDuck extends Duck
{
    public function __construct()
    {
        parent::__construct(flyNoWay(), squeakBehavior(), noDanceBehavior());
    }

    public function display(): void
    {
        echo "I'm rubber duck\n";
    }
}