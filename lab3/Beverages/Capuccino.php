<?php

class Capuccino extends Coffee
{
    private $description;

    public function __construct(string $description = "Capuccino")
    {
        parent::__construct($description);
    }

    final public function getDescription(): string
    {
        return $this->description;
    }

    public function getCost(): float
    {
        return 80;
    }
}