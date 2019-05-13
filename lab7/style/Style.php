<?php

class Style implements StyleInterface
{
    /** @var bool */
    private $isEnabled;
    /** @var RGBAColor */
    private $color;

    /**
     * Style constructor.
     * @param bool $isEnabled
     * @param RGBAColor $color
     */
    public function __construct(bool $isEnabled, RGBAColor $color)
    {
        $this->isEnabled = $isEnabled;
        $this->color = $color;
    }

    public function isEnabled(): bool
    {
        return $this->isEnabled;
    }

    public function enabled(bool $enable): void
    {
        $this->isEnabled = true;
    }

    public function getColor(): RGBAColor
    {
        return $this->color;
    }

    public function setColor(RGBAColor $color): void
    {
        $this->color = $color;
    }
}