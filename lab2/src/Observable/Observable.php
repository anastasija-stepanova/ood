<?php

class Observable implements ObservableInterface
{
    /**
     * @var ObservableType
     */
    private $type;
    private $observers = [];

    public function __construct(ObservableType $type)
    {
        $this->type = $type;
    }

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
        usort($this->observers, function ($left, $right) {
            return $left["priority"] < $right["priority"];
        });
        foreach ($this->observers as $observer) {
            $observer["observer"]->update($this);
        }
    }

    private function searchObserver($observer)
    {
        return array_search($observer, $this->observers);
    }
}