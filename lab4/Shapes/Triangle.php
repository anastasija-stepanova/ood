<?php

class Triangle extends Shape
{
    /** @var Point[] */
    private $vertices;

    public function __construct(Point $vertex1, Point $vertex2, Point $vertex3, string $color)
    {
        parent::__construct($color);
        $this->vertices []= $vertex1;
        $this->vertices []= $vertex2;
        $this->vertices []= $vertex3;
    }

    public function draw(CanvasInterface $canvas): void
    {
        $canvas->setColor($this->getColor());

        $canvas->drawLine($this->getVertex1(), $this->getVertex2());
        $canvas->drawLine($this->getVertex2(), $this->getVertex3());
        $canvas->drawLine($this->getVertex3(), $this->getVertex1());
    }

    public function getVertex1(): Point
    {
        return $this->vertices[0];
    }

    public function getVertex2(): Point
    {
        return $this->vertices[1];
    }

    public function getVertex3(): Point
    {
        return $this->vertices[2];
    }
}