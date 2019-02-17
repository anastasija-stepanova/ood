<?php

interface IObserver
{
    public function update(SWeatherInfo $data): void;
}
