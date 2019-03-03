<?php

require_once("inc/include.php");

function main()
{
    $ws = new WeatherStation();

    $display = new Display();
    $ws->registerObserver($display, 1);
    $ws->registerObserver($display, 9999);

    $statsDisplay = new StatsDisplay();
    $ws->registerObserver($statsDisplay, 999);
    $wind = new Wind();
    $wind->direction = 0.0;
    $wind->speed = 5.0;

    $ws->setMeasurements(3, 0.7, 760, $wind);

    $wind->speed = 10.0;
    $wind->direction = 90.0;
    $ws->setMeasurements(4, 0.8, 761, $wind);

    return 0;
}

main();