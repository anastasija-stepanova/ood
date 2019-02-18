<?php

abstract class Observable implements ObservableInterface
{
    private $observers = [];

    protected abstract function getChangedData(): WeatherInfo;

    public function registerObserver(ObserverInterface $observer): void
    {
        $this->observers [] = $observer;
    }

    public function removeObserver(ObserverInterface $observer): void
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