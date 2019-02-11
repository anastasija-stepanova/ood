<?php

class MillardDuck extends Duck
{
    public function __construct()
    {
        parent::__construct(flyWithWings(), quackBehavior(), danceWaltz());
    }

    public function display(): void
    {
        echo "I'm mallard duck\n";
    }
}