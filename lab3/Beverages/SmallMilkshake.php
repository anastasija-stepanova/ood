<?php

class SmallMilkshake extends Milkshake
{
    public function __construct(string $description = "Milkshake")
    {
        parent::__construct($description);
    }

    public function getCost(): float
    {
        return 50;
    }
}