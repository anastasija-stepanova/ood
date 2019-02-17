<?php

require_once ('Observer/IObserver.php');
require_once ('Observable/IObservable.php');
require_once ('Observable/CObservable.php');
require_once ('WeatherUtils/SWeatherInfo.php');
require_once ('WeatherUtils/WeatherStation.php');
require_once ('Display/CDisplay.php');
require_once ('Display/CStatsDisplay.php');

function main()
{
    $ws = new WeatherStation();

    $display = new CDisplay();
    $ws->registerObserver($display);

    $statsTemp = new CStatsDisplay('temperature', function(SWeatherInfo $info) {
        return $info->temperature;
    });
    $ws->registerObserver($statsTemp);

    $statsHum = new CStatsDisplay('humidity', function(SWeatherInfo $info) {
        return $info->humidity;
    });
    $ws->registerObserver($statsHum);

    $statsPressure = new CStatsDisplay('pressure', function(SWeatherInfo $info) {
        return $info->pressure;
    });
    $ws->registerObserver($statsPressure);

    $ws->setMeasurements(3, 0.7, 760);
    $ws->setMeasurements(4, 0.8, 761);

    $ws->setMeasurements(10, 0.8, 761);
    $ws->setMeasurements(-10, 0.8, 761);
    return 0;
}

main();