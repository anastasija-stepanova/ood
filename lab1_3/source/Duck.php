<?php

abstract class Duck
{
    private $flyBehavior;
    private $quackBehavior;
    private $danceBehavior;

    public function __construct(callable &$flyBehavior, callable &$quackBehavior, callable &$danceBehavior)
    {
        $this->SetFlyBehavior($flyBehavior);
        $this->SetQuackBehavior($quackBehavior);
        $this->SetDanceBehavior($danceBehavior);
    }

    public function Swim(): void
    {
        echo "I'm swimming\n";
    }

    public function Dance(): void
    {
        call_user_func($this->danceBehavior);
    }

    public function Quack(): void
    {
        call_user_func($this->quackBehavior);
    }

    public function Fly(): void
    {
        call_user_func($this->flyBehavior);
    }

    public function SetFlyBehavior(callable &$flyBehavior): void
    {
        assert($flyBehavior);
        $this->flyBehavior = $flyBehavior;
    }

    public function SetQuackBehavior(callable &$quackBehavior): void
    {
        assert($quackBehavior);
        $this->quackBehavior = $quackBehavior;
    }

    public function SetDanceBehavior(callable &$danceBehavior): void
    {
        assert($danceBehavior);
        $this->danceBehavior = $danceBehavior;
    }

    abstract public function Display(): void;
}