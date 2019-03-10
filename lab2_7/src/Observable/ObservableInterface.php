<?php

interface ObservableInterface
{
    public function registerObserver(ObserverInterface $observer, int $priority, string $development): void;
    public function removeObserver(ObserverInterface $observer): void;
    public function notifyObservers(): void;
    public function getDevelopments(): array;
}