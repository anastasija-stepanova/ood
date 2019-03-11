<?php

class Latte extends Coffee
{
    private const STANDARD_PORTION = 1;

    private $size;
    private $description;

    public function __construct(string $description = "Latte", int $size = self::STANDARD_PORTION)
    {
        $this->description = $this->size == self::STANDARD_PORTION ? $description : "Double Latte";
        parent::__construct($this->description);
        $this->size = $size;
    }

    public function getCost(): float
    {
        return $this->size == self::STANDARD_PORTION ? 90 : 130;
    }
}