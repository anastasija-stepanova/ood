<?php

interface StyleInterface
{
    public function isEnabled(): bool;
    public function enabled(bool $enabled): void;
    public function getColor(): RGBAColor;
    public function setColor(RGBAColor $color): void;
}