<?php

class GumballMachine
{
    /** @var GumBallMachineContextInterface */
    private $context;

    public function __construct(int $numBalls)
    {
        $this->context = new GumballMachineContext($numBalls);
    }

    public function getBallCount(): int
    {
        return $this->context->getBallCount();
    }

    public function ejectQuarter(): void
    {
        $this->context->ejectQuarter();
    }

    public function insertQuarter(): void
    {
        $this->context->insertQuarter();
    }

    public function turnCrank(): void
    {
        $this->context->turnCrank();
    }

    public function toString(): string
    {
        return $this->context->toString();
    }

    public function getQuarterController(): QuarterController
    {
        return $this->context->getQuarterController();
    }

    public function refill($numBall)
    {
        $this->context->refill($numBall);
    }
}