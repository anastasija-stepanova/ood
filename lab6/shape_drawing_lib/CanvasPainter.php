<?php

namespace shape_drawing_lib
{

    use graphics_lib\CanvasInterface;

    class CanvasPainter
    {
        /** @var CanvasInterface */
        private $canvas;

        /**
         * CanvasPainter constructor.
         * @param CanvasInterface $canvas
         */
        public function __construct(CanvasInterface $canvas)
        {
            $this->canvas = $canvas;
        }

        public function draw(CanvasDrawableInterface $drawable)
        {
            $drawable->draw($this->canvas);
        }
    }
}