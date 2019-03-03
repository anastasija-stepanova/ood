<?php

class Observer implements ObserverInterface
{
    /** @var string */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param ObservableInterface $observable
     */
    public function update(ObservableInterface $observable): void
    {
        echo $this->name . PHP_EOL;
        $observable->removeObserver($this);
    }
}