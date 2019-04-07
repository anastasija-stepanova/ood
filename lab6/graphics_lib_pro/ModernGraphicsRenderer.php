<?php

namespace graphics_lib_pro
{
    class ModernGraphicsRenderer
    {
        /**  @var bool */
        private $drawing = false;

        public function beginDraw(): void
        {
            if ($this->drawing)
            {
                echo "Drawing has already begun";
                return;
            }
            echo "<draw>\n";
            $this->drawing = true;
        }

        public function drawLine(Point $start, Point $end, RGBAColor $color): void
        {
            if (!$this->drawing)
            {
                echo "DrawLine is allowed between BeginDraw()/EndDraw() only";
                return;
            }
            echo "<line fromX=" . $start->getX() . " fromY=" . $start->getY() . " toX=" . $end->getX() . " toY=" . $end->getY() . ">\n";
            echo "  <color r=" . $color->getR() . " g=" . $color->getG() . " b=" . $color->getB() . " a=" . $color->getA() . " />\n";
            echo "</line>\n";
        }

        public function endDraw(): void
        {
            if (!$this->drawing)
            {
                echo "Drawing has not been started";
            }
            echo "</draw>\n";
            $this->drawing = false;
        }
    }
}