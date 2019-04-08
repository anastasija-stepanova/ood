<?php

namespace app
{

    use graphics_lib\CanvasInterface;
    use modern_graphics_lib\ModernGraphicsRenderer;
    use modern_graphics_lib\Point;

    class ModernGraphicsRendererAdapter implements CanvasInterface
    {
        private $graphicsRenderer;
        private $currentPoint;

        /**
         * ModernGraphicsRendererAdapter constructor.
         * @param ModernGraphicsRenderer $graphicsRenderer
         */
        public function __construct(ModernGraphicsRenderer $graphicsRenderer)
        {
            $this->graphicsRenderer = $graphicsRenderer;
            $this->currentPoint = new Point(0, 0);
            $this->graphicsRenderer->beginDraw();
        }

        public function moveTo(int $x, int $y): void
        {
           $this->currentPoint->setX($x);
           $this->currentPoint->setY($y);
        }

        public function lineTo(int $x, int $y): void
        {
            $newPoint = new Point($x, $y);
            $this->graphicsRenderer->drawLine($this->currentPoint, $newPoint);
            $this->currentPoint = $newPoint;
        }

        public function __destruct()
        {
            $this->graphicsRenderer->endDraw();
        }
    }
}