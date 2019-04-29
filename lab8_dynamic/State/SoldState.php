<?php

class SoldState implements State
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
            $quarterCount = $this->gumballMachine->getQuarterCount();
            if ($quarterCount == 0) {
                $this->gumballMachine->setNoQuarterState();
                return;
            }
            $this->gumballMachine->setHasQuarterState();
        }
    }

    public function ToString(): string
    {
        return 'delivering a gumball';
    }

    public function refill(int $ballsCount)
    {
        echo "Cant refill machine in SOLD state";
    }
}