<?php

interface SlideInterface
{
    public function draw(CanvasInterface $canvas): void;
    public function getWidth(): float;
    public function getHeight(): float;
    public function getShapes(): array;
    public function add(GroupShape $shape): void;
    public function addShape(ShapeInterface $shape): void;
}