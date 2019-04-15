<?php

class SoldState implements StateInterface
{
    /** @var GumballMachine */
    private $gumballMachine;

    public function __construct(GumballMachine $gumballMachine)
    {
        $this->gumballMachine = $gumballMachine;
    }

    public function insertQuarter(): void
    {
        $this->gumballMachine->getQuarterController()->addQuarter();
//        echo 'Please wait, we\'re already giving you a gumball' . PHP_EOL;
    }

    public function ejectQuarter(): void
    {
        $this->gumballMachine->getQuarterController()->returnQuarter();
        echo 'Sorry you already turned the crank' . PHP_EOL;
    }

    public function turnCrank(): void
    {
        echo 'Turning twice doesn\'t get you another gumball' . PHP_EOL;
    }

    public function dispense(): void
    {
        $this->gumballMachine->releaseBall();
        if ($this->gumballMachine->getBallCount() == 0) {
            echo 'Oops, out of gumballs' . PHP_EOL;
            $this->gumballMachine->setSoldOutState();
        } else {
            $this->gumballMachine->setNoQuarterState();
        }
    }

    public function ToString(): string
    {
        return 'delivering a gumball';
    }
}