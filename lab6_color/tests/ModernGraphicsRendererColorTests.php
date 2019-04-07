<?php

require_once("../inc/inc.php");

use \PHPUnit\Framework\TestCase;

final class ModernGraphicsRendererColorTests extends TestCase
{
    public function test_canDrawLine()
    {
        $renderer = new \modern_graphics_lib\ModernGraphicsRenderer();
        $adapter = new \modern_graphics_lib\ModernGraphicsRendererAdapter($renderer);
        $adapter->lineTo(5, 6);
        $this->expectOutputString('<draw>' . PHP_EOL . '<line fromX=0 fromY=0 toX=5 toY=6/>' . PHP_EOL . '</draw>' . PHP_EOL);
    }

    public function test_canDrawTriangle()
    {
        $renderer = new \graphics_lib_pro\ModernGraphicsRenderer();
        $adapter = new \graphics_lib_pro\ModernGraphicsRendererAdapter($renderer);
        $painter = new \shape_drawing_lib\CanvasPainter($adapter);
        $triangle = new \shape_drawing_lib\Triangle(new \shape_drawing_lib\Point(10, 15), new \shape_drawing_lib\Point(100, 200), new \shape_drawing_lib\Point(150, 250), new \graphics_lib_pro\RGBAColor(250, 250, 250, 1));
        $painter->draw($triangle);
        $this->expectOutputString('<draw>' . PHP_EOL . '<line fromX=0 fromY=0 toX=10 toY=200>' . PHP_EOL . '  <color r=250 g=250 b=250 a=1 />' . PHP_EOL . '</line>' . PHP_EOL . '<line fromX=10 fromY=200 toX=100 toY=250>' . PHP_EOL . '  <color r=250 g=250 b=250 a=1 />' . PHP_EOL . '</line>' . PHP_EOL . '<line fromX=100 fromY=250 toX=150 toY=15>' . PHP_EOL . '  <color r=250 g=250 b=250 a=1 />' . PHP_EOL . '</line>' . PHP_EOL . '</draw>' . PHP_EOL);
    }

    public function test_canDrawRectangle()
    {
        $renderer = new \graphics_lib_pro\ModernGraphicsRenderer();
        $adapter = new \graphics_lib_pro\ModernGraphicsRendererAdapter($renderer);
        $painter = new \shape_drawing_lib\CanvasPainter($adapter);
        $rectangle = new \shape_drawing_lib\Rectangle(new \shape_drawing_lib\Point(30, 40), 18, 24, new \graphics_lib_pro\RGBAColor(250, 250, 250, 1));
        $painter->draw($rectangle);
        $this->expectOutputString('<draw>' . PHP_EOL . '<line fromX=0 fromY=0 toX=30 toY=40>' . PHP_EOL . '  <color r=250 g=250 b=250 a=1 />' . PHP_EOL . '</line>' . PHP_EOL . '<line fromX=30 fromY=40 toX=48 toY=40>' . PHP_EOL . '  <color r=250 g=250 b=250 a=1 />' . PHP_EOL . '</line>' . PHP_EOL . '<line fromX=48 fromY=40 toX=48 toY=16>' . PHP_EOL . '  <color r=250 g=250 b=250 a=1 />' . PHP_EOL . '</line>' . PHP_EOL . '<line fromX=48 fromY=16 toX=30 toY=16>' . PHP_EOL . '  <color r=250 g=250 b=250 a=1 />' . PHP_EOL . '</line>' . PHP_EOL . '</draw>' . PHP_EOL);
    }
}