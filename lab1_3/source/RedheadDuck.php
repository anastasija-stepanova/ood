<?php

class RedheadDuck extends Duck
{
    public function __construct()
    {
        parent::__construct(flyWithWings(), quackBehavior(), danceMinuet());
    }

    public function display(): void
    {
        echo "I'm redhead duck\n";
    }
}