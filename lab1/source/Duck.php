<?php

abstract class Duck
{
    private $flyBehavior;
    private $quackBehavior;
    private $danceBehavior;

    public function __construct(
        IFlyBehavior $flyBehavior,
        IQuackBehavior $quackBehavior,
        IDanceBehavior $danceBehavior
    ) {
        $this->setFlyBehavior($flyBehavior);
        $this->setQuackBehavior($quackBehavior);
        $this->setDanceBehavior($danceBehavior);
    }

    public function swim(): void
    {
        echo "I'm swimming\n";
    }

    final public function dance(): void
    {
        $this->danceBehavior->dance();
    }

    final public function quack(): void
    {
        $this->quackBehavior->quack();
    }

    final public function fly(): void
    {
        $this->flyBehavior->fly();
    }

    public function setFlyBehavior(IFlyBehavior &$flyBehavior): void
    {
        assert($flyBehavior);
        $this->flyBehavior = $flyBehavior;
    }

    public function setQuackBehavior(IQuackBehavior &$quackBehavior): void
    {
        assert($quackBehavior);
        $this->quackBehavior = $quackBehavior;
    }

    public function setDanceBehavior(IDanceBehavior &$danceBehavior): void
    {
        assert($danceBehavior);
        $this->danceBehavior = $danceBehavior;
    }

    abstract public function display(): void;
}