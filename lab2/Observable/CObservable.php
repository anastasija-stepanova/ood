<?php

abstract class CObservable implements IObservable
{
    private $observers = [];

    protected abstract function getChangedData(): SWeatherInfo;

    public function registerObserver(IObserver $observer): void
    {
        $this->observers [] = $observer;
    }

    public function removeObserver(IObserver $observer): void
    {
        $item = array_search($observer, $this->observers);
        if ($item) {
            unset($this->observers[$item]);
        }
    }

    public function notifyObservers(): void
    {
        $data = $this->getChangedData();

        foreach ($this->observers as $observer) {
            $observer->update($data);
        }
    }
}