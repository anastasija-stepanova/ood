<?php

namespace graphics_lib_pro
{
    interface CanvasInterface
    {
        public function moveTo(int $x, int $y);
        public function lineTo(int $x, int $y);
        public function setColor(RGBAColor $color);
    }
}