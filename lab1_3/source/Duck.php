<?php

abstract class Duck
{
    private $flyBehavior;
    private $quackBehavior;
    private $danceBehavior;

    public function __construct(callable $flyBehavior, callable $quackBehavior, callable $danceBehavior)
    {
        $this->setFlyBehavior($flyBehavior);
        $this->setQuackBehavior($quackBehavior);
        $this->setDanceBehavior($danceBehavior);
    }

    public function swim(): void
    {
        echo "I'm swimming\n";
    }

    public function dance(): void
    {
        call_user_func($this->danceBehavior);
    }

    public function quack(): void
    {
        call_user_func($this->quackBehavior);
    }

    public function fly(): void
    {
        call_user_func($this->flyBehavior);
    }

    public function setFlyBehavior(callable &$flyBehavior): void
    {
        assert($flyBehavior);
        $this->flyBehavior = $flyBehavior;
    }

    public function setQuackBehavior(callable &$quackBehavior): void
    {
        assert($quackBehavior);
        $this->quackBehavior = $quackBehavior;
    }

    public function setDanceBehavior(callable &$danceBehavior): void
    {
        assert($danceBehavior);
        $this->danceBehavior = $danceBehavior;
    }

    abstract public function display(): void;
}