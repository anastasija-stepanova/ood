<?php

class Observable implements ObservableInterface
{
    /** @var ObserverInterface[] */
    private $observers = [];

    public function registerObserver(ObserverInterface $observer, int $priority): void
    {
        $newObserver = [
            "priority" => $priority,
            "observer" => $observer,
        ];
        $item = $this->searchObserver($observer);

        if (!$item) {
            $this->observers [] = $newObserver;
        } else {
            $this->observers[$item] = $newObserver;
        }
        $this->sortObservers();
    }

    public function removeObserver(ObserverInterface $observer): void
    {
        $item = $this->searchObserver($observer);
        if ($item) {
            unset($this->observers[$item]);
        }
    }

    public function notifyObservers(): void
    {
        /** @var array $observer */
        foreach ($this->observers as $observer) {
            $observer["observer"]->update($this);
        }
    }

    private function searchObserver($observer)
    {
        return array_search($observer, $this->observers);
    }

    private function sortObservers()
    {
        usort($this->observers, function ($left, $right) {
            return $left["priority"] < $right["priority"];
        });
    }
}