<?php

interface ShapesInterface
{
    public function getShapesCount(): int;
    public function insertShape(ShapeInterface $shape, int $position);
    public function getShapeAtIndex(int $index): ShapeInterface;
    public function removeShapeAtIndex(int $index): void;
}