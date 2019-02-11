<?php

function noDanceBehavior(): callable
{
    return function (): void
    {
        echo "I can not dance\n";
    };
}

function danceWaltz(): callable
{
    return function (): void
    {
        echo "I'm dancing a waltz\n";
    };
}

function danceMinuet(): callable
{
    return function (): void
    {
        echo "I'm dancing a minuet\n";
    };
}