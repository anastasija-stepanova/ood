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

    $ws->setMeasurements(3, 0.7, 760);
    $ws->setMeasurements(4, 0.8, 761);

    $ws->removeObserver($statsDisplay);

    $ws->setMeasurements(10, 0.8, 761);
    $ws->setMeasurements(-10, 0.8, 761);

    return 0;
}

main();