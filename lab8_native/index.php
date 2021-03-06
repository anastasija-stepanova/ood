<?php

require_once("inc/inc.php");

function main(): void
{
    $gm = new GumballMachine(5);

    echo $gm->toString() . PHP_EOL;
    $gm->insertQuarter();
    $gm->insertQuarter();
    $gm->refill(10);
    $gm->insertQuarter();
    $gm->insertQuarter();
    $gm->insertQuarter();
    $gm->turnCrank();
    $gm->refill(10);

    echo $gm->toString() . PHP_EOL;
    $gm->insertQuarter();
    $gm->ejectQuarter();
    $gm->turnCrank();

    echo $gm->toString() . PHP_EOL;
    $gm->insertQuarter();
    $gm->turnCrank();
    $gm->insertQuarter();
    $gm->refill(10);
    $gm->turnCrank();
    $gm->ejectQuarter();
    $gm->refill(10);

    echo $gm->toString() . PHP_EOL;
    $gm->insertQuarter();
    $gm->insertQuarter();
    $gm->turnCrank();
    $gm->insertQuarter();
    $gm->turnCrank();
    $gm->insertQuarter();
    $gm->turnCrank();

    echo $gm->toString() . PHP_EOL;
}

main();