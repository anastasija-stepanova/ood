<?php

namespace shape_drawing_lib
{
    use graphics_lib_pro\CanvasInterface;
    use graphics_lib_pro\RGBAColor;

    class Rectangle implements CanvasDrawableInterface
    {
        /** @var Point */
        private $leftTop;
        /** @var int */
        private $width;
        /** @var int */
        private $height;
        /** @var RGBAColor */
        private $color;

        public function __construct(Point $leftTop, int $width, int $height, RGBAColor $color = null)
        {
            $this->leftTop = $leftTop;
            $this->width = $width;
            $this->height = $height;
            $this->color = $color;
        }

        public function draw(CanvasInterface $canvas): void
        {
            $canvas->setColor($this->color);
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