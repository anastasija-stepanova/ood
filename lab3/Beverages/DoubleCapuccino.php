<?php

class DoubleCapuccino extends Coffee
{
    public function __construct(string $description = "Double Capuccino")
    {
        parent::__construct($description);
    }

    public function getCost(): float
    {
        return 120;
    }
}