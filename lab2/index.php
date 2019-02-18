<?php

require_once('Observer/ObserverInterface.php');
require_once('Observable/ObservableInterface.php');
require_once('Observable/Observable.php');
require_once('WeatherUtils/WeatherInfo.php');
require_once ('WeatherUtils/WeatherStation.php');
require_once('Display/DisplayInterface.php');
require_once('Display/StatsDisplayInterface.php');
require_once ('Display/IndicatorCalculator.php');

function main()
{
    $ws = new WeatherStation();

    $display = new Display();
    $ws->registerObserver($display);

    $statsDisplay= new StatsDisplay();
    $ws->registerObserver($statsDisplay);

    $ws->setMeasurements(3, 0.7, 760);
    $ws->setMeasurements(4, 0.8, 761);

    $ws->removeObserver($statsDisplay);

    $ws->setMeasurements(10, 0.8, 761);
    $ws->setMeasurements(-10, 0.8, 761);
    return 0;
}

main();