<?php

class GumballMachineContextMock implements GumBallMachineContextInterface
{
    /** @var SoldState */
    private $soldState;
    /** @var SoldOutState */
    private $soldOutState;
    /** @var NoQuarterState */
    private $noQuarterState;
    /** @var HasQuarterState */
    private $hasQuarterState;
    /** @var StateInterface */
    private $state;
    /** @var int */
    private $count;
    /** @var QuarterController */
    private $controller;

    public function __construct(int $numBalls)
    {
        $this->soldState = new SoldState($this);
        $this->soldOutState = new SoldOutState($this);
        $this->noQuarterState = new NoQuarterState($this);
        $this->hasQuarterState = new HasQuarterState($this);
        $this->controller = new QuarterController();
        $this->state = $this->soldState;
        $this->count = $numBalls;
        if ($this->count > 0) {
            $this->state = $this->noQuarterState;
        }
    }

    public function releaseBall(): void
    {
        if ($this->count != 0) {
            echo 'A gumball comes rolling out the slot...' . PHP_EOL;
            --$this->count;
        }
    }

    public function getBallCount(): int
    {
        return $this->count;
    }

    public function setSoldOutState(): void
    {
        echo "Set sold out state" . PHP_EOL;
    }

    public function setNoQuarterState(): void
    {
        echo "Set no quarter state" . PHP_EOL;
    }

    public function setSoldState(): void
    {
        echo "Set sold state" . PHP_EOL;
    }

    public function setHasQuarterState(): void
    {
        echo "Set has quarter state" . PHP_EOL;
    }

    public function ejectQuarter(): void
    {
        echo "Eject quarter" . PHP_EOL;
    }

    public function insertQuarter(): void
    {
        echo "Insert quarter" . PHP_EOL;
    }

    public function turnCrank(): void
    {
        echo "Turn crank" . PHP_EOL;
    }

    public function toString(): string
    {
        $str = $this->getStringTemplate();
        $postfix = ($this->count != 1 ? 's' : '');

        return sprintf($str, $this->count, $postfix, $this->state->ToString());
    }

    public function getQuarterController(): QuarterController
    {
        return $this->controller;
    }

    public function getQuarterCount(): int
    {
        return $this->controller->getQuarterCount();
    }

    private function getStringTemplate(): string
    {
        return <<<EOF
Mighty Gumball, Inc.
PHP-enabled Standing Gumball Model #2019 (with state)
Inventory: %d gumball%s
Machine is %s
EOF;
    }
}