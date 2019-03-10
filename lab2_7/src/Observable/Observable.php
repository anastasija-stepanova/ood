<?php

//ассоциативный массив ключ - событие, значение-массив наблюдателей

class Observable implements ObservableInterface
{
    private $observers = [];
    public $developments = [];

    public function getDevelopments(): array
    {
        return $this->developments;
    }

    public function registerObserver(ObserverInterface $observer, int $priority, string $development): void
    {
        if (!in_array($development, $this->developments, true)) {

            $this->developments [] = $development;
        }
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
        foreach ($this->observers as $observer) {
            $observer["observer"]->update($this);
        }
    }

    public function unsubscribe(ObserverInterface $observer, string $development)
    {
        if (in_array($development, $this->developments, true)) {

            unset($this->developments[$development]);
        }
    }

    private function searchObserver($observer)
    {
        return array_search($observer, $this->observers);
    }

    private function sortObservers()
    {
        usort($this->observers, function ($left, $right)
        {
            return $left["priority"] < $right["priority"];
        });
    }
}