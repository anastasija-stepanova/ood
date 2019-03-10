<?php

interface BeverageInterface
{
    public function __construct(string $description);
    public function getDescription(): string;
    public function getCost(): float;
}