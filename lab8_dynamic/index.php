<?php

require_once("inc/inc.php");

function main(): void
{
    $gm = new GumballMachine(5);

    echo $gm->toString() . PHP_EOL;
    $gm->insertQuarter();
    $gm->insertQuarter();
    $gm->insertQuarter();
    $gm->insertQuarter();
    $gm->insertQuarter();
    $gm->refill(8548566554856);
    $gm->turnCrank();

    echo $gm->toString() . PHP_EOL;
    $gm->insertQuarter();
    $gm->ejectQuarter();
    $gm->refill(14854);
    $gm->turnCrank();
    $gm->refill(10);

    echo $gm->toString() . PHP_EOL;
    $gm->insertQuarter();
    $gm->turnCrank();
    $gm->insertQuarter();
    $gm->turnCrank();
    $gm->ejectQuarter();

    echo $gm->toString() . PHP_EOL;
    $gm->insertQuarter();
    $gm->insertQuarter();
    $gm->turnCrank();
    $gm->refill(11);
    $gm->insertQuarter();
    $gm->turnCrank();
    $gm->insertQuarter();
    $gm->turnCrank();
    $gm->ejectQuarter();
    echo "----\n";

    echo $gm->toString() . PHP_EOL;
}

main();