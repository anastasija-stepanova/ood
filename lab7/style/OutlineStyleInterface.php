<?php

interface OutlineStyleInterface extends StyleInterface
{
    public function getOutlineThickness(): float;

    public function setOutlineThickness(float $thickness): void;
}