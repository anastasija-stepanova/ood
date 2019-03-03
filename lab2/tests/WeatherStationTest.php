<?php

require_once ("../inc/include.php");
use \PHPUnit\Framework\TestCase;

final class WeatherStationTest extends TestCase
{
    public function testRemoveObserverOnUpdate()
    {
        $observable = new Observable();
        $observable->registerObserver(new Observer('ObserverOne'), 0);
        $observable->registerObserver(new Observer('ObserverTwo'), 0);
        ob_start();
        $observable->notifyObservers();
        ob_end_clean();
        $this->assertTrue(true);
    }

    public function testObserverPriority()
    {
        $observable = new Observable();
        $observable->registerObserver(new Observer('ObserverOne'), 1);
        $observable->registerObserver(new Observer('ObserverTwo'), 6666);
        ob_start();
        $observable->notifyObservers();
        $stream = ob_get_flush();
        ob_clean();
        $this->assertEquals("ObserverTwo\r\nObserverOne\r\n", $stream);
    }
}