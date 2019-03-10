<?php

abstract class CondimentDecorator implements BeverageInterface
{
    /** @var Beverage */
    private $beverage;

    public function __construct(BeverageInterface $beverage)
    {
        $this->beverage = $beverage;
    }

    public function getDescription(): string
    {
        return implode(', ', [$this->beverage->getDescription(), $this->getCondimentDescription()]);
    }

    public function getCost(): float
    {
        return $this->beverage->getCost() + $this->getCondimentCost();
    }

    abstract protected function getCondimentDescription(): string;
    abstract protected function getCondimentCost(): float;
}