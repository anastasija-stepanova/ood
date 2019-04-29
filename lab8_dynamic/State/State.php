<?php

interface State
{
    public function insertQuarter(): void;

    public function ejectQuarter(): void;

    public function turnCrank(): void;

    public function dispense(): void;

    public function toString();

    public function refill(int $ballsCount);
}