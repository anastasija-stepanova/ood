<?php

interface ObservableInterface
{
    public function registerObserver(ObserverInterface $observer, int $priority): void;
    public function removeObserver(ObserverInterface $observer): void;
    public function notifyObservers(): void;
}