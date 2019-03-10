<?php

class Lemon extends CondimentDecorator
{
    private $quantity = 1;

    protected function getCondimentDescription(): string
    {
        return "Lemon x " . $this->quantity;
    }

    protected function getCondimentCost(): float
    {
        return 10 * $this->quantity;
    }
}