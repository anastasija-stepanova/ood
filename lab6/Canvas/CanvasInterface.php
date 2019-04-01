<?php

namespace graphics_lib
{

    interface CanvasInterface
    {
        public function moveTo(int $x, int $y): void;

        public function lineTo(int $x, int $y): void;
    }
}