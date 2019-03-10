<?php

abstract class CondimentDecorator implements BeverageInterface
{
    /** @var Beverage */
    private $beverage;
    private $description;

    public function __construct(string $description)
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->beverage->getDescription() . ', ' . $this->getCondimentDescription();
    }

    public function getCost(): float
    {
        return $this->beverage->getCost() . ', ' . $this->getCondimentCost();
    }

    abstract protected function getCondimentDescription(): string;
    abstract protected function getCondimentCost(): float;
}