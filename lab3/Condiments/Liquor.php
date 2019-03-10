<?php

class Liquor extends CondimentDecorator
{
    /** @var LiquorType */
    private $type;

    public function __construct(BeverageInterface $beverage, LiquorType $type)
    {
        parent::__construct($beverage);
        $this->type = $type;
    }
    public function getCondimentDescription(): string
    {
        return ($this->type == LiquorType::Chocolate() ? 'Chocolate' : 'Walnut') . ' liquor';
    }
    public function getCondimentCost(): float
    {
        return 50;
    }
}