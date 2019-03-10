<?php

class LargeMilkshake extends Milkshake
{
    public function __construct(string $description = "Large Milkshake")
    {
        parent::__construct($description);
    }

    public function getCost(): float
    {
        return 80;
    }
}