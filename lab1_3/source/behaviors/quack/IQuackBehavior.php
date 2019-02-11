<?php

function muteQuackBehavior(): callable
{
    return function (): void
    {
    };
}

function quackBehavior(): callable
{
    return function (): void
    {
        echo "Quack Quack\n";
    };
}

function squeakBehavior(): callable
{
    return function (): void
    {
        echo "Squeek\n";
    };
}