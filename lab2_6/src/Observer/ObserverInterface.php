<?php

interface ObserverInterface
{
    /**
     * @param WeatherInfo|ObservableInterface $observable
     */
    public function update(ObservableInterface $observable): void;
}
