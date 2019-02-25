<?php

require_once ("inc/include.php");

function main()
{
    $weatherStationIn = new WeatherStation(ObservableType::IN());
    $display = new Display();
    $weatherStationIn->registerObserver($display, 2);

    $statsDisplay = new StatsDisplay();
    $weatherStationIn->registerObserver($statsDisplay, 1);

    $weatherStationIn->setMeasurements(3, 0.7, 760);
    $weatherStationIn->setMeasurements(4, 0.8, 761);


    $weatherStationOut = new WeatherStation(ObservableType::OUT());
    $displayTwo = new Display();
    $weatherStationOut->registerObserver($displayTwo, 2);

    $statsDisplayTwo = new StatsDisplay();
    $weatherStationOut->registerObserver($statsDisplayTwo, 9999);

    $weatherStationOut->setMeasurements(25, 0.9, 758);
    $weatherStationOut->setMeasurements(20, 0.7, 700);

    return 0;
}

main();