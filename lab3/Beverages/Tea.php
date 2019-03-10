<?php

class Tea extends Beverage
{
    private $description;

    public function __construct(string $description = "Tea")
    {
        parent::__construct($description);
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getCost(): float
    {
        return 30;
    }
}