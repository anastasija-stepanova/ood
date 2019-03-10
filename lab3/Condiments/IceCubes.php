<?php

class IceCubes extends CondimentDecorator
{
    private $quantity = 1;
    /** @var IceCubeType */
    private $type;

    public function __construct(BeverageInterface $beverage, int $quantity = 1, IceCubeType $type = null)
    {
        parent::__construct($beverage);
        $this->quantity = $quantity;
        $this->type = $type;
    }

    protected function getCondimentDescription(): string
    {
        return $this->type == IceCubeType::Dry() ? "Dry" : "Water" . " ice cubes x " . $this->quantity;
    }

    protected function getCondimentCost(): float
    {
        return ($this->type == IceCubeType::Dry() ? 10 : 5) * $this->quantity;
    }
}