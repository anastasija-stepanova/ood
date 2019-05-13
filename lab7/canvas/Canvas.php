<?php

class Canvas implements CanvasInterface
{
    /** @var RGBAColor */
    private $lineColor;
    /** @var RGBAColor */
    private $fillColor;
    /** @var float */
    private $lineThickness;
    /** @var bool */
    private $isFilling;
    /** @var Point */
    private $lastPoint;

    public function setFillColor(RGBAColor $color): void
    {
        $this->fillColor = $color;
    }

    public function setLineColor(RGBAColor $color): void
    {
        $this->lineColor = $color;
    }

    public function setLineThickness(float $thickness): void
    {
        $this->lineThickness = $thickness;
    }

    public function beginFill(RGBAColor $color): void
    {
        if ($this->isFilling) {
            echo "Drawing has already begun." . PHP_EOL;
        }
        echo "Begin fill" . PHP_EOL;
        $this->isFilling = true;
        $this->fillColor = $color;
    }

    public function endFill(): void
    {
        if (!$this->isFilling) {
            echo "Drawing has already begun." . PHP_EOL;
        }
        echo "End fill" . PHP_EOL;
        $this->isFilling = false;
    }

    public function moveTo(float $x, float $y): void
    {
        echo "Move to (" . $x . ", " . $y . ")" . PHP_EOL;
        $this->lastPoint = new Point($x, $y);
    }

    public function lineTo(float $x, float $y): void
    {
        echo "Line to (" . $x . ", " . $y . ")" . PHP_EOL;
        $this->lastPoint->setX($x);
        $this->lastPoint->setY($y);
    }

    public function drawEllipse(float $left, float $top, float $width, float $height): void
    {
        echo "Draw ellipse: " . PHP_EOL;
        echo "Color: " . $this->lineColor->getR() . $this->lineColor->getG() . $this->lineColor->getB() . $this->lineColor->getA() . PHP_EOL;
        echo "Left: " . $left . PHP_EOL;
        echo "Top: " . $top . PHP_EOL;
        echo "Width: " . $width . PHP_EOL;
        echo "Height: " . $height . PHP_EOL;
    }

    public function fillPolygon(array $xPoints, array $yPoints, int $numberPoints): void
    {
        echo "Fill polygon: ";
        for ($i = 0; $i < $numberPoints; ++$i)
        {
            echo "(" . $xPoints[$i] . ", " .$yPoints[$i] . ") ";
        }
        echo PHP_EOL;
    }
}