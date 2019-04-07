<?php

namespace shape_drawing_lib
{
    use graphics_lib_pro\CanvasInterface;

    interface CanvasDrawableInterface
    {
        public function draw(CanvasInterface $canvas): void;
    }
}