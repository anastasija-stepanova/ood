<?php

class Ellipse extends Shape
{
    /** @var Point */
    private $center;
    /** @var float */
    private $horizontalRadius;
    /** @var float */
    private $verticalRadius;
    public function __construct(Point $center, float $horizontalRadius, float $verticalRadius)
    {
        $this->center = clone $center;
        $this->horizontalRadius = $horizontalRadius;
        $this->verticalRadius = $verticalRadius;
        $defaultColor = new RGBAColor(0, 0, 0);
        $defaultThickness = 2;
        $defaultOutlineStyle = new OutlineStyle($defaultColor, $defaultThickness);
        $defaultFillStyle = new FillStyle($defaultColor);
        parent::__construct($defaultOutlineStyle, $defaultFillStyle, null);
    }
    public function getFrame(): RectD
    {
        $leftTopX = $this->center->getX() - $this->horizontalRadius;
        $leftTopY = $this->center->getX() - $this->verticalRadius;
        $width = $this->horizontalRadius * 2;
        $height = $this->verticalRadius * 2;
        $leftTop = new Point($leftTopX, $leftTopY);
        return new RectD($leftTop, $width, $height);
    }
    public function setFrame(RectD $frame): void
    {
        $this->horizontalRadius = $frame->getWidth() / 2;
        $this->verticalRadius = $frame->getHeight() / 2;
        $point = $frame->getLeftTopPoint();
        $x = $point->getX() + $this->horizontalRadius;
        $y = $point->getY() + $this->verticalRadius;
        $this->center = new Point($x, $y);
    }
    public function draw(CanvasInterface $canvas): void
    {
        $canvas->setOutlineThickness($this->getOutlineStyle()->getOutlineThickness());
        $canvas->setOutlineColor($this->getOutlineStyle()->getColor());
        $canvas->setFillColor($this->getFillStyle()->getColor());
        $canvas->drawEllipse($this->center, $this->horizontalRadius, $this->verticalRadius);
    }
}