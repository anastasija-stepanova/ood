<?php

interface CanvasInterface
{
    public function setColor(): void;
    public function drawLine($from, $to): void;
    public function drawEllipse($l, $t, $w, $h): void;
}