<?php

require_once("inc/include.php");

function main()
{
    $ws = new WeatherStation();

    $wind = new Wind();
    $wind->direction = 0.0;
    $wind->speed = 5.0;
    $display = new Display();
    $ws->registerObserver($display, 1, "Pressure");
    $ws->registerObserver($display, 9999,"Temperature");

    $ws->setMeasurements(3, 0.7, 760, $wind);
    $statsDisplay = new StatsDisplay();
    $ws->registerObserver($statsDisplay, 1, "Temperature");
    $ws->unsubscribe($display, "Temperature");

    $ws->setMeasurements(10, 0.5, 758, $wind);
    return 0;
}

main();