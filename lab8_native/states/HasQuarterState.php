<?php

class HasQuarterState implements StateInterface
{
    /** @var GumballMachineContext */
    private $gumballMachine;

    public function __construct(GumballMachineContext $gumballMachine)
    {
        $this->gumballMachine = $gumballMachine;
    }

    public function insertQuarter(): void
    {
        $this->gumballMachine->getQuarterController()->addQuarter();
//        echo 'You can\'t insert another quarter' . PHP_EOL;
    }

    public function ejectQuarter(): void
    {
        $this->gumballMachine->getQuarterController()->returnQuarter();
//        echo 'Quarter returned' . PHP_EOL;
        $this->gumballMachine->setNoQuarterState();
    }

    public function turnCrank(): void
    {
        echo 'You turned...' . PHP_EOL;
        $this->gumballMachine->getQuarterController()->useQuarter();
        $this->gumballMachine->setSoldState();
    }

    public function dispense(): void
    {
        echo 'No gumball dispensed' . PHP_EOL;
    }

    public function ToString(): string
    {
        return 'waiting for turn of crank';
    }
}