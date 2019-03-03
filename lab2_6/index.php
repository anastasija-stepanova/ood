<?php

require_once("inc/include.php");

function main()
{
    $weatherStationIn = new WeatherStation(ObservableType::IN());
    $display = new Display();
    $weatherStationIn->registerObserver($display, 2);

    $statsDisplay = new StatsDisplay();
    $weatherStationIn->registerObserver($statsDisplay, 1);
    $weatherStationIn->setMeasurements(25, 0.9, 758);
    $weatherStationIn->setMeasurements(20, 0.7, 700);

    $weatherStationOut = new WeatherStation(ObservableType::OUT());
    $displayTwo = new Display();
    $weatherStationOut->registerObserver($displayTwo, 2);

    $statsDisplayTwo = new StatsDisplay();
    $weatherStationOut->registerObserver($statsDisplayTwo, 9999);
    $wind = new Wind();
    $wind->direction = 0.0;
    $wind->speed = 5.0;
    $weatherStationOut->setMeasurements(3, 0.7, 760, $wind);
    $wind->speed = 10.0;
    $wind->direction = 90.0;
    $weatherStationOut->setMeasurements(4, 0.8, 761, $wind);
    return 0;
}

main();