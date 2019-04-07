<?php

namespace modern_graphics_lib
{
    use graphics_lib\CanvasInterface;

    class ModernGraphicsRendererClassAdapter extends ModernGraphicsRenderer implements CanvasInterface
    {
        private $currentPoint;

        public function __construct()
        {
            $this->currentPoint = new Point(0, 0);
            $this->beginDraw();
        }

        public function moveTo(int $x, int $y): void
        {
            $this->currentPoint->setX($x);
            $this->currentPoint->setY($y);
        }

        public function lineTo(int $x, int $y): void
        {
            $newPoint = new Point($x, $y);
            $this->drawLine($this->currentPoint, $newPoint);
            $this->currentPoint = $newPoint;
        }

        public function __destruct()
        {
            $this->endDraw();
        }
    }
}