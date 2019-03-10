<?php

class IceCubes extends CondimentDecorator
{
    private $quantity = 1;
    /** @var IceCubeType */
    private $type;

    protected function getCondimentDescription(): string
    {
        return $this->type == IceCubeType::Dry() ? "Dry" : "Water"
            . " ice cubes x " . $this->quantity;
    }

    protected function getCondimentCost(): float
    {
        return ($this->type == IceCubeType::Dry() ? 10 : 5) * $this->quantity;
    }
}