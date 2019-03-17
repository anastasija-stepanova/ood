<?php

interface ShapeFactoryInterface
{
    public function createShape(string $description): Shape;
}