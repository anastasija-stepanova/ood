<?php

function NoDanceBehavior() : callable
{
    return function () : void
    {
        echo "I can not dance\n";
    };
}

function DanceWaltz() : callable
{
    return function () : void
    {
        echo "I'm dancing a waltz\n";
    };
}

function DanceMinuet() : callable
{
    return function () : void
    {
        echo "I'm dancing a minuet\n";
    };
}