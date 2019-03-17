<?php

class Canvas implements CanvasInterface
{
    private $color;

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function drawLine($from, $to): void
    {
        echo "Draw line: \n";
        echo "Color " . $this->color . "\n";
        echo "From (" . $from->getX() . ", " . $from->getY() . ")\n";
        echo "Fo (" . $to->getX() . ", " . $to->getY() . ")\n";
    }

    public function drawEllipse($l, $t, $w, $h): void
    {
        echo "Draw ellipse: \n";
        echo "Color: " . $this->color . "\n";
        echo "Left: " . $l . "\n";
        echo "Top: " . $t . "\n";
        echo "Width: " . $w . "\n";
        echo "Height: " . $h . "\n";
    }
}