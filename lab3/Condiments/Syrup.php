<?php

class Syrup extends CondimentDecorator
{
    /** @var SyrupType */
    private $type;

    public function __construct(BeverageInterface $beverage, SyrupType $type)
    {
        parent::__construct($beverage);
        $this->type = $type;
    }

    public function getCondimentDescription(): string
    {
        return ($this->type == SyrupType::Chocolate() ? 'Chocolate' : 'Maple') . ' syrup';
    }

    public function getCondimentCost(): float
    {
        return 15;
    }
}