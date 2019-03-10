<?php

class Capuccino extends Coffee
{
    public function __construct(string $description = "Capuccino")
    {
        parent::__construct($description);
    }

    public function getCost(): float
    {
        return 80;
    }
}