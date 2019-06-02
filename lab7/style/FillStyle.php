<?php

class FillStyle implements StyleInterface
{
    /** @var RGBAColor */
    private $color;
    /** @var bool */
    private $enable;

    public function __construct(RGBAColor $color, ?bool $enable = true)
    {
        $this->color = $color;
        $this->enable = $enable;
    }

    public function isEnabled(): bool
    {
        return $this->enable;
    }

    public function enabled(bool $enabled): void
    {
        $this->enable = $enabled;
    }

    public function getColor(): RGBAColor
    {
        return clone $this->color;
    }

    public function setColor(RGBAColor $color): void
    {
        $this->color = $color;
    }
}