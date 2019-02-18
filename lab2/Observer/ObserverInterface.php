<?php

interface ObserverInterface
{
    public function update(WeatherInfo $data): void;
}
