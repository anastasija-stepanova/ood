<?php

class DecoyDuck extends Duck
{
    public function __construct()
    {
        parent::__construct(flyWithWings(), muteQuackBehavior(), noDanceBehavior());
    }

    public function display(): void
    {
        echo "I'm decoy duck\n";
    }
}