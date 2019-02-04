<?php

abstract class Duck
{
    private $m_flyBehavior;
    private $m_quackBehavior;
    private $m_danceBehavior;

    public function __construct(IFlyBehavior &$flyBehavior, IQuackBehavior &$quackBehavior, IDanceBehavior &$danceBehavior)
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
        $this->m_danceBehavior->Dance();
    }

    public function Quack(): void
    {
        $this->m_quackBehavior->Quack();
    }

    public function Fly(): void
    {
        $this->m_flyBehavior->Fly();
    }

    public function SetFlyBehavior(IFlyBehavior &$flyBehavior): void
    {
        assert($flyBehavior);
        $this->m_flyBehavior = $flyBehavior;
    }

    public function SetQuackBehavior(IQuackBehavior &$quackBehavior): void
    {
        assert($quackBehavior);
        $this->m_quackBehavior = $quackBehavior;
    }

    public function SetDanceBehavior(IDanceBehavior &$danceBehavior): void
    {
        assert($danceBehavior);
        $this->m_danceBehavior = $danceBehavior;
    }

    abstract public function Display(): void;
}