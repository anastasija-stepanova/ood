<?php

class Ellipse extends Shape
{
    /** @var Point */
    private $center;
    /** @var float */
    private $horizontalRadius;
    /** @var float */
    private $verticalRadius;

    public function __construct(Point $center, float $horizontalRadius, float $verticalRadius, string $color)
    {
        parent::__construct($color);
        $this->center = $center;
        $this->horizontalRadius = $horizontalRadius;
        $this->verticalRadius = $verticalRadius;
    }

    public function draw(CanvasInterface $canvas): void
    {
        $canvas->setColor($this->getColor());
        $left = $this->center->getX() - $this->horizontalRadius;
        $top = $this->center->getY() - $this->verticalRadius;
        $canvas->drawEllipse($left, $top, $this->horizontalRadius, $this->verticalRadius);
    }

    public function getCenter(): Point
    {
        return $this->center;
    }

    public function getHorizontalRadius(): float
    {
        return $this->horizontalRadius;
    }

    public function getVerticalRadius(): float
    {
        return $this->verticalRadius;
    }
}