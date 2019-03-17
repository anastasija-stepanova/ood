<?php

class PictureDraft
{
    /** @var Shape[] */
    private $shapes;

    public function __construct()
    {
        $this->shapes = [];
    }

    public function getShapeCount(): int
    {
        return count($this->shapes);
    }

    public function getShapes()
    {
        return $this->shapes;
    }

    public function addShape(Shape $shape): void
    {
        $this->shapes []= $shape;
    }
}