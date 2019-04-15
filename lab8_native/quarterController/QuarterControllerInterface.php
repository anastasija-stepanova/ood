<?php

interface QuarterControllerInterface
{
    public function addQuarter(): void;

    public function useQuarter(): void;

    public function returnQuarter(): void;

    public function getQuarterCount(): int;
}