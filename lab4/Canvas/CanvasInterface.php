<?php

interface CanvasInterface
{
    public function setColor(string $color): void;
    public function drawLine(Point $from, Point $to): void;
    public function drawEllipse(float $l, float $t, float $w, float $h): void;
}