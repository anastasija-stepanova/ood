<?php

namespace shape_drawing_lib
{
    use graphics_lib_pro\CanvasInterface;
    use graphics_lib_pro\RGBAColor;
    use phpDocumentor\Reflection\Types\This;

    class Triangle implements CanvasDrawableInterface
    {
        /** @var Point[] */
        private $vertices;
        /** @var RGBAColor */
        private $color;

        public function __construct(Point $vertex1, Point $vertex2, Point $vertex3, RGBAColor $color = null)
        {
            $this->vertices []= $vertex1;
            $this->vertices []= $vertex2;
            $this->vertices []= $vertex3;
            $this->color = $color;
        }

        public function draw(CanvasInterface $canvas): void
        {
            $canvas->setColor($this->color);
            $canvas->lineTo($this->getVertex1()->getX(), $this->getVertex2()->getY());
            $canvas->lineTo($this->getVertex2()->getX(), $this->getVertex3()->getY());
            $canvas->lineTo($this->getVertex3()->getX(), $this->getVertex1()->getY());
        }

        public function getVertex1(): Point
        {
            return $this->vertices[0];
        }
        public function getVertex2(): Point
        {
            return $this->vertices[1];
        }
        public function getVertex3(): Point
        {
            return $this->vertices[2];
        }
    }
}