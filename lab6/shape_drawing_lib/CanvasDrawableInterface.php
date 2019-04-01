<?php

namespace shape_drawing_lib
{
    use graphics_lib\CanvasInterface;

    interface CanvasDrawableInterface
    {
        public function draw(CanvasInterface $canvas): void;
    }
}