<?php

interface ShapeInterface
{
    public function getFrame(): RectD;
    public function setFrame(RectD $rect): void;
    public function getOutlineStyle(): StyleInterface;
    public function getFillStyle(): StyleInterface;
}