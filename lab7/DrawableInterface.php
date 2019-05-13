<?php

interface DrawableInterface
{
    public function draw(CanvasInterface $canvas): void;
}