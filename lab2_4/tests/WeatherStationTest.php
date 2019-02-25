<?php

require_once ("../inc/include.php");
use \PHPUnit\Framework\TestCase;

final class WeatherStationTest extends TestCase
{
//    public function testRemoveObserverOnUpdate()
//    {
//        $observable = new Observable();
//        $observable->registerObserver(new Display(), 1);
//        $observable->registerObserver(new StatsDisplay(), 2);
//        ob_start();
//        $observable->notifyObservers();
//        ob_end_clean();
//        $this->assertTrue(true);
//    }

    public function testObserverPriority()
    {
        $observable = new Observable();
        $observable->registerObserver(new Display(), 2);
        $observable->registerObserver(new StatsDisplay(), 1);
        ob_start();
        $observable->notifyObservers();
        ob_end_clean();
        $this->assertTrue(true);
    }
}