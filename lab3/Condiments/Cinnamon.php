<?php

class Cinnamon extends CondimentDecorator
{
    public function __construct(BeverageInterface $beverage)
    {
        parent::__construct($beverage);
    }

    protected function getCondimentDescription(): string
    {
        return "Cinnamon";
    }

    protected function getCondimentCost(): float
    {
       return 20;
    }
}