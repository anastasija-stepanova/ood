<?php

class SoldOutState implements StateInterface
{
    /** @var GumBallMachineContextInterface */
    private $gumballMachine;

    public function __construct(GumBallMachineContextInterface $gumballMachine)
    {
        $this->gumballMachine = $gumballMachine;
    }

    public function insertQuarter(): void
    {
        echo 'You can\'t insert a quarter, the machine is sold out' . PHP_EOL;
    }

    public function ejectQuarter(): void
    {
        if ($this->gumballMachine->getQuarterController()->getQuarterCount() == 0) {
            echo 'You can\'t eject, you haven\'t inserted a quarter yet' . PHP_EOL;
        } else {
            $this->gumballMachine->getQuarterController()->returnQuarter();
            $this->gumballMachine->setNoQuarterState();
        }
    }

    public function turnCrank(): void
    {
        echo 'You turned but there\'s no gumballs' . PHP_EOL;
    }

    public function dispense(): void
    {
        echo 'No gumball dispensed' . PHP_EOL;
    }

    public function ToString(): string
    {
        return 'sold out';
    }
}