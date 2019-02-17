<?php

interface IObservable
{
    public function registerObserver(IObserver $observer): void;
    public function removeObserver(IObserver $observer): void;
    public function notifyObservers(): void;
}