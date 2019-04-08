<?php

require_once("../inc/inc.php");

use \PHPUnit\Framework\TestCase;

final class ModernGraphicsRendererClassAdapterTests extends TestCase
{
    public function test_canDrawLine()
    {
        $adapter = new \app\ModernGraphicsRendererClassAdapter();
        $adapter->lineTo(5, 6);
        $this->expectOutputString('<draw>' . PHP_EOL . '<line fromX=0 fromY=0 toX=5 toY=6/>' . PHP_EOL . '</draw>' . PHP_EOL);
    }

    public function test_canMoveTo()
    {
        $adapter = new \app\ModernGraphicsRendererClassAdapter();
        $adapter->lineTo(5, 6);
        $adapter->moveTo(1, 4);
        $adapter->lineTo(2, 5);
        $this->expectOutputString('<draw>' . PHP_EOL . '<line fromX=0 fromY=0 toX=5 toY=6/>' . PHP_EOL . '<line fromX=1 fromY=4 toX=2 toY=5/>' . PHP_EOL . '</draw>' . PHP_EOL);
    }
}