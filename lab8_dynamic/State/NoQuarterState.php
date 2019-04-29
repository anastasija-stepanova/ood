<?php

class NoQuarterState implements State
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
        $this->gumballMachine->setHasQuarterState();
    }

    public function ejectQuarter(): void
    {
        echo 'You haven\'t inserted a quarter' . PHP_EOL;
    }

    public function turnCrank(): void
    {
        echo 'You turned but there\'s no quarter' . PHP_EOL;
    }

    public function dispense(): void
    {
        echo 'You need to pay first' . PHP_EOL;
    }

    public function ToString(): string
    {
        return 'waiting for quarter';
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