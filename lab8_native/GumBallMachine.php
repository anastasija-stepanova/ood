<?php

class GumballMachine implements GumballMachineInterface
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
        $this->controller = new QuarterController();
        $this->state = State::SOLD_OUT;
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
        $this->state = $this->soldOutState;
    }

    public function setNoQuarterState(): void
    {
        $this->state = $this->noQuarterState;
    }

    public function setSoldState(): void
    {
        $this->state = $this->soldState;
    }

    public function setHasQuarterState(): void
    {
        $this->state = $this->hasQuarterState;
    }

    public function ejectQuarter(): void
    {
        switch ($this->state) {
            case State::HAS_QUARTER:
                echo "Quarter returned" . PHP_EOL;
                $this->state = State::NO_QUARTER;
                break;
            case State::NO_QUARTER:
                echo "You haven't inserted a quarter" . PHP_EOL;
                break;
            case State::SOLD:
                echo "Sorry you already turned the crank" . PHP_EOL;
                break;
            case State::SOLD_OUT:
                echo "You can't eject, you haven't inserted a quarter yet" . PHP_EOL;
                break;
        }
    }

    public function insertQuarter(): void
    {
        switch ($this->state) {
            case State::SOLD_OUT:
                echo "You can't insert a quarter, the machine is sold out" . PHP_EOL;
                break;
            case State::NO_QUARTER:
                echo "You inserted a quarter" . PHP_EOL;
                $this->state = State::HAS_QUARTER;
                break;
            case State::HAS_QUARTER:
                echo "You can't insert another quarter" . PHP_EOL;
                break;
            case State::SOLD:
                echo "Please wait, we're already giving you a gumball" . PHP_EOL;
                break;
        }
    }

    public function turnCrank(): void
    {
        switch ($this->state) {
            case State::SOLD_OUT:
                echo "You turned but there's no gumballs" . PHP_EOL;
                break;
            case State::NO_QUARTER:
                echo "You turned but there's no quarter" . PHP_EOL;
                break;
            case State::HAS_QUARTER:
                echo "You turned..." . PHP_EOL;
                $this->state = State::SOLD_OUT;
                $this->dispense();
                break;
            case State::SOLD:
                echo "Turning twice doesn't get you another gumball" . PHP_EOL;
                break;
        }
    }

    public function dispense()
    {
        switch ($this->state) {
            case State::SOLD:
                echo "A gumball comes rolling out the slot" . PHP_EOL;
                --$this->count;
                if ($this->count == 0) {
                    echo "Oops, out of gumballs" . PHP_EOL;
                    $this->state = State::SOLD_OUT;
                } else {
                    $this->state = State::NO_QUARTER;
                }
                break;
            case State::NO_QUARTER:
                echo "You need to pay first" . PHP_EOL;
                break;
            case State::SOLD_OUT:
            case State::HAS_QUARTER:
                echo "No gumball dispensed" . PHP_EOL;
                break;
        }
    }

    public function toString(): string
    {
        $state = ($this->state == State::SOLD_OUT) ? "sold out" :
            ($this->state == State::NO_QUARTER) ? "waiting for quarter" :
                ($this->state == State::HAS_QUARTER) ? "waiting for turn of crank"
                    : "delivering a gumball";
        $str = $this->getStringTemplate();

        $postfix = ($this->count != 1 ? 's' : '');
        return sprintf($str, $this->count, $postfix, $state);
    }

    public function getQuarterController(): QuarterController
    {
        return $this->controller;
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