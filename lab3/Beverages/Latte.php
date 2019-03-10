<?php

class Latte extends Coffee
{
    private $description;

    public function __construct(string $description = "Latte")
    {
        parent::__construct($description);
    }

    final public function getDescription(): string
    {
        return $this->description;
    }

    public function getCost(): float
    {
        return 90;
    }
}