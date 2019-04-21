<?php

namespace app
{

    use graphics_lib_pro\CanvasInterface;
    use graphics_lib_pro\ModernGraphicsRenderer;
    use graphics_lib_pro\Point;
    use graphics_lib_pro\RGBAColor;

    class ModernGraphicsRendererAdapter implements CanvasInterface
    {
        private $graphicsRenderer;
        private $currentPoint;
        private $color;

        /**
         * ModernGraphicsRendererAdapter constructor.
         * @param ModernGraphicsRenderer $graphicsRenderer
         */
        public function __construct(ModernGraphicsRenderer $graphicsRenderer)
        {
            $this->graphicsRenderer = $graphicsRenderer;
            $this->currentPoint = new Point(0, 0);
            $this->color = new RGBAColor(0, 0, 0, 1);
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
            $this->graphicsRenderer->drawLine($this->currentPoint, $newPoint, $this->color);
            $this->currentPoint = $newPoint;
        }

        public function setColor(RGBAColor $rgbColor): void
        {
            $this->color = $rgbColor;
        }

        public function __destruct()
        {
            $this->graphicsRenderer->endDraw();
        }
    }
}