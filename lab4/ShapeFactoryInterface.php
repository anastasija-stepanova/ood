<?php

interface ShapeFactoryInterface
{
    public function createShape(string $description): ShapeFactory;
}