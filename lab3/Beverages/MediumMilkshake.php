<?php

class MediumMilkshake extends Milkshake
{
    public function __construct(string $description = "Medium Milkshake")
    {
        parent::__construct($description);
    }

    public function getCost(): float
    {
        return 60;
    }
}