<?php

class GumballMachineContext implements GumBallMachineContextInterface
{
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
            $this->state = State::NO_QUARTER;
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
        $this->state = State::SOLD_OUT;
    }

    public function setNoQuarterState(): void
    {
        $this->state = State::NO_QUARTER;
    }

    public function setSoldState(): void
    {
        $this->state = State::SOLD;
    }

    public function setHasQuarterState(): void
    {
        $this->state = State::HAS_QUARTER;
    }

    public function ejectQuarter(): void
    {
        switch ($this->state) {
            case State::HAS_QUARTER:
                $this->getQuarterController()->returnQuarter();
                $this->setNoQuarterState();
                break;
            case State::NO_QUARTER:
                echo 'You haven\'t inserted a quarter' . PHP_EOL;
                break;
            case State::SOLD:
                $this->getQuarterController()->returnQuarter();
                echo 'Sorry you already turned the crank' . PHP_EOL;
                break;
            case State::SOLD_OUT:
                if ($this->getQuarterController()->getQuarterCount() == 0) {
                    echo 'You can\'t eject, you haven\'t inserted a quarter yet' . PHP_EOL;
                } else {
                    $this->getQuarterController()->returnQuarter();
                    $this->setNoQuarterState();
                }
                break;
        }
    }

    public function insertQuarter(): void
    {
        switch ($this->state) {
            case State::SOLD_OUT:
                echo 'You can\'t insert a quarter, the machine is sold out' . PHP_EOL;
                break;
            case State::NO_QUARTER:
                $this->getQuarterController()->addQuarter();
                $this->setHasQuarterState();
                break;
            case State::HAS_QUARTER:
                $this->getQuarterController()->addQuarter();
                break;
            case State::SOLD:
                $this->getQuarterController()->addQuarter();
                break;
        }
    }

    public function turnCrank(): void
    {
        switch ($this->state) {
            case State::SOLD_OUT:
                echo 'You turned but there\'s no gumballs' . PHP_EOL;
                break;
            case State::NO_QUARTER:
                echo 'You turned but there\'s no quarter' . PHP_EOL;
                break;
            case State::HAS_QUARTER:
                echo 'You turned...' . PHP_EOL;
                $this->getQuarterController()->useQuarter();
                $this->setSoldState();
                $this->dispense();
                break;
            case State::SOLD:
                echo 'Turning twice doesn\'t get you another gumball' . PHP_EOL;
                break;
        }
    }

    public function dispense()
    {
        switch ($this->state) {
            case State::SOLD:
                $this->releaseBall();
                if ($this->getBallCount() == 0) {
                    echo 'Oops, out of gumballs' . PHP_EOL;
                    $this->setSoldOutState();
                } else {
                    $this->setNoQuarterState();
                }
                break;
            case State::NO_QUARTER:
                echo 'You need to pay first' . PHP_EOL;
                break;
            case State::SOLD_OUT:
                echo 'No gumball dispensed' . PHP_EOL;
                break;
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