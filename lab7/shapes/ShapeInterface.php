<?php

interface ShapeInterface extends DrawableInterface
{
    public function getFrame(): RectD;
    public function setFrame(RectD $frame): void;
    public function getOutlineStyle(): OutlineStyleInterface;
    public function getFillStyle(): StyleInterface;
    public function getGroup(): ?GroupShapeInterface;
}