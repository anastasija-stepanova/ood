<?php

namespace shape_drawing_lib
{
    use graphics_lib\CanvasInterface;

    class Rectangle implements CanvasDrawableInterface
    {
        /** @var Point */
        private $leftTop;
        /** @var int */
        private $width;
        /** @var int */
        private $height;

        public function __construct(Point $leftTop, int $width, int $height)
        {
            $this->leftTop = $leftTop;
            $this->width = $width;
            $this->height = $height;
        }

        public function draw(CanvasInterface $canvas): void
        {
            $canvas->lineTo($this->leftTop->getX(), $this->leftTop->getY());
            $canvas->lineTo($this->leftTop->getX() + $this->width, $this->leftTop->getY());
            $canvas->lineTo($this->leftTop->getX() + $this->width, $this->leftTop->getY() - $this->height);
            $canvas->lineTo($this->leftTop->getX(), $this->leftTop->getY() - $this->height);
        }

        public function getLeftTop(): Point
        {
            return $this->leftTop;
        }
    }
}