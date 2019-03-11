<?php

class Capuccino extends Coffee
{
    private const STANDARD_PORTION = 1;

    private $size;
    private $description;

    public function __construct(string $description = "Capuccino", int $size = self::STANDARD_PORTION)
    {
        $this->description = $this->size == self::STANDARD_PORTION ? $description : "Double Capuccino";
        parent::__construct($this->description);
        $this->size = $size;
    }

    public function getCost(): float
    {
        return $this->size == self::STANDARD_PORTION ? 80 : 120;
    }
}