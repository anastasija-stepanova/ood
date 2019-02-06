<?php

function FlyNoWay() : callable
{
    return function () : void
    {

    };
}
function FlyWithWings() : callable
{
    $flightsCount = 0;
    return function () use (&$flightsCount): void
    {
        ++$flightsCount;
        echo "I'm flying with wings\n";
        echo "This flight is " . $flightsCount . "\n";
    };
}