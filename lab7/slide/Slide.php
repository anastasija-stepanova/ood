<?php

class Slide implements SlideInterface
{
    /** @var float */
    private $width;
    /** @var float */
    private $height;
    /** @var Shape[] */
    private $shapes;

    public function __construct(float $width, float $height)
    {
        $this->width = $width;
        $this->height = $height;
        $this->shapes = [];
    }

    public function draw(CanvasInterface $canvas): void
    {
        foreach ($this->shapes as $shape) {
            $shape->draw($canvas);
        }
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function getShapes(): array
    {
        return $this->shapes;
    }

    public function add(GroupShape $shape): void
    {
        $this->shapes[] = $shape;
    }
}