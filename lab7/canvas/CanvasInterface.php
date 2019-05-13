<?php

interface CanvasInterface
{
    public function setFillColor(RGBAColor $color): void;
    public function setLineColor(RGBAColor $color): void;
    public function setLineThickness(float $thickness): void;
    public function beginFill(RGBAColor $color): void;
    public function endFill(): void;
    public function moveTo(float $x, float $y): void;
    public function lineTo(float $x, float $y): void;
    public function drawEllipse(float $left, float $top, float $width, float $height): void;
    public function fillPolygon(array $xPoints, array $yPoints, int $numberPoints): void;
}