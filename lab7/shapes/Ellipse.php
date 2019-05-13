<?php

class Ellipse extends Shape
{
    public function __construct(RectD $frame, Style $fillStyle, Style $outlineStyle, float $lineThickness)
    {
        parent::__construct($frame, $fillStyle, $outlineStyle, $lineThickness);
    }

    public function drawBehavior(CanvasInterface $canvas): void
    {
        $frame = $this->getFrame();
        $canvas->drawEllipse($frame->getLeft(), $frame->getTop(), $frame->getWidth(), $frame->getHeight());
    }
}