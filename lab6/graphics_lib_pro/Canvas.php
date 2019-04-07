<?php

namespace graphics_lib_pro
{

    class Canvas implements CanvasInterface
    {
        public function moveTo(int $x, int $y)
        {
            echo "MoveTo (" . $x . ", " . $y . ")\n";
        }

        public function lineTo(int $x, int $y)
        {
            echo "LineTo (" . $x . ", " . $y . ")\n";
        }

        public function setColor($color)
        {
            echo $color . "\n";
        }
    }
}