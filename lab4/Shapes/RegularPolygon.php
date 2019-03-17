<?php

class RegularPolygon extends Shape
{
    /** @var Point */
    private $center;
    /** @var float */
    private $radius;
    /** @var int */
    private $vertexCount;

    public function __construct(Point $center, float $radius, int $vertexCount, string $color)
    {
        if ($vertexCount < 0)
        {
            new Exception("Vertex count can't be zero");
        }
        parent::__construct($color);
        $this->center = $center;
        $this->radius = $radius;
        $this->vertexCount = $vertexCount;
    }

    public function draw(CanvasInterface $canvas): void
    {
        $canvas->setColor($this->getColor());
        $corner = $this->getAngle();
        $fromX = $this->center->getX() + $this->radius + cos(0);
        $from = new Point($fromX, $this->center->getY());
        $centerX = $this->center->getX();
        $centerY = $this->center->getY();
        for ($index = 1; $index <= $this->vertexCount; ++$index)
        {
            $toX = $centerX + $this->radius * cos($corner * $index);
            $toY = $centerY + $this->radius * sin($corner * $index);
            $to = new Point($toX, $toY);
            $canvas->drawLine($from, $to);
            $from = $to;
        }
    }

    public function getVertexCount(): int
    {
        return $this->vertexCount;
    }

    public function getCenter(): Point
    {
        return $this->center;
    }

    public function getRadius(): float
    {
        return $this->radius;
    }

    private function getAngle(): float
    {
        if ($this->vertexCount == 0)
        {
            new Exception("Division by zero!");
        }
        return 2 * M_PI / $this->vertexCount;
    }
}