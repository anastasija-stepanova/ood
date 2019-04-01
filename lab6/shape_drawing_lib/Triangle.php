<?php

namespace shape_drawing_lib
{
    use graphics_lib\CanvasInterface;

    class Triangle implements CanvasDrawableInterface
    {
        /** @var Point[] */
        private $vertices;

        public function __construct(Point $vertex1, Point $vertex2, Point $vertex3)
        {
            $this->vertices []= $vertex1;
            $this->vertices []= $vertex2;
            $this->vertices []= $vertex3;
        }

        public function draw(CanvasInterface $canvas): void
        {
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