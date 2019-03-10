<?php

class HerbalTea extends Tea
{
    public function __construct(string $description = "Herbal Tea")
    {
        parent::__construct($description);
    }
}