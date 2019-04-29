<?php

class HasQuarterState implements State
{
    /** @var GumBallMachineContextInterface */
    private $gumballMachine;

    public function __construct(GumBallMachineContextInterface $gumballMachine)
    {
        $this->gumballMachine = $gumballMachine;
    }

    public function insertQuarter(): void
    {
        $this->gumballMachine->getQuarterController()->addQuarter();
    }

    public function ejectQuarter(): void
    {
        $this->gumballMachine->getQuarterController()->returnQuarter();
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

    public function refill(int $ballsCount)
    {
        if ($ballsCount < 0) {
            echo "Count of gumballs cant be less than zero.";
        }
        $this->gumballMachine->setBallCount($ballsCount);
        if ($this->gumballMachine->getBallCount() == 0) {
            $this->gumballMachine->setSoldState();
        }
    }
}