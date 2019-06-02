<?php

interface CanvasInterface
{
    public function setFillColor(RGBAColor $color): void;
    public function setOutlineColor(RGBAColor $color): void;
    public function setSize(float $width, float $height): void;
    public function setOutlineThickness(float $thickness): void;
    public function drawEllipse(Point $center, float $horizontalRadius, float $verticalRadius): void;
    public function drawLine(Point $from, Point $to): void;
    public function drawPolygon(array $points): void;
}