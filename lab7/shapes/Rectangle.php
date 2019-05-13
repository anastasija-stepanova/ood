<?php

class Rectangle extends Shape
{
    public function __construct(RectD $frame, Style $fillStyle, Style $outlineStyle, float $lineThickness)
    {
        parent::__construct($frame, $fillStyle, $outlineStyle, $lineThickness);
    }

    public function drawBehavior(CanvasInterface $canvas): void
    {
        $frame = $this->getFrame();

        $xPoints[] = $frame->getLeft();
        $xPoints[] = $frame->getLeft() + $frame->getWidth();
        $xPoints[] = $frame->getLeft() + $frame->getWidth();
        $xPoints[] = $frame->getLeft();
        $yPoints[] = $frame->getTop();
        $yPoints[] = $frame->getTop();
        $yPoints[] = $frame->getTop() + $frame->getHeight();
        $yPoints[] = $frame->getTop() + $frame->getHeight();

        $canvas->moveTo($xPoints[0], $yPoints[0]);
        $canvas->lineTo($xPoints[1], $yPoints[1]);
        $canvas->lineTo($xPoints[2], $yPoints[2]);
        $canvas->lineTo($xPoints[3], $yPoints[3]);
        $canvas->lineTo($xPoints[0], $yPoints[0]);

        $canvas->fillPolygon($xPoints, $yPoints, 4);
    }
}