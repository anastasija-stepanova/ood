<?php

class Lemon extends CondimentDecorator
{
    private $quantity = 1;

    public function __construct(BeverageInterface $beverage, int $quantity)
    {
        parent::__construct($beverage);
        $this->quantity = $quantity;
    }

    protected function getCondimentDescription(): string
    {
        return "Lemon x " . $this->quantity;
    }

    protected function getCondimentCost(): float
    {
        return 10 * $this->quantity;
    }
}