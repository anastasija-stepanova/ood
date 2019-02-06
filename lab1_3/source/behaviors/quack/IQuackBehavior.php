<?php

function MuteQuackBehavior() : callable
{
    return function () : void
    {
    };
}

function QuackBehavior() : callable
{
    return function () : void
    {
        echo "Quack Quack\n";
    };
}

function SqueakBehavior() : callable
{
    return function () : void
    {
        echo "Squeek\n";
    };
}