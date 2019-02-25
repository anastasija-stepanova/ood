<?php

interface ObserverInterface
{
    /**
     * @param WeatherInfo|ObservableInterface $observable
     * @param ObservableType $type
     */
    public function update(ObservableInterface $observable, ObservableType $type): void;
}
