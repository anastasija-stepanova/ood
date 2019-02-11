<?php

function flyNoWay(): callable
{
    return function (): void
    {

    };
}

function flyWithWings(): callable
{
    $flightsCount = 0;

    return function () use (&$flightsCount): void
    {
        ++$flightsCount;
        echo "I'm flying with wings\n";
        echo "This flight is " . $flightsCount . "\n";
    };
}