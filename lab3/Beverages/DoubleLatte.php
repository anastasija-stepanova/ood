<?php

class DoubleLatte extends Coffee
{
    public function __construct(string $description = "Double Latte")
    {
        parent::__construct($description);
    }

    public function getCost(): float
    {
        return 130;
    }
}