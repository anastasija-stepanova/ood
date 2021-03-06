<?php

namespace modern_graphics_lib
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
            echo "<draw>" . PHP_EOL;
            $this->drawing = true;
        }

        public function drawLine(Point $start, Point $end): void
        {
            if (!$this->drawing)
            {
                echo "DrawLine is allowed between BeginDraw()/EndDraw() only";
                return;
            }
            echo "<line fromX=" . $start->getX() . " fromY=" . $start->getY() . " toX=" . $end->getX() . " toY=" . $end->getY() . "/>"  . PHP_EOL;
        }

        public function endDraw(): void
        {
            if (!$this->drawing)
            {
                echo "Drawing has not been started";
            }
            echo "</draw>" . PHP_EOL;
            $this->drawing = false;
        }
    }
}