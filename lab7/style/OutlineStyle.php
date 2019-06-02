<?php

class OutlineStyle implements OutlineStyleInterface
{
    /** @var RGBAColor */
    private $color;
    /** @var float */
    private $thickness;
    /** @var bool */
    private $enable;

    /**
     * OutlineStyle constructor.
     * @param RGBAColor $color
     * @param float $thickness
     * @param bool|null $enable
     */
    public function __construct(RGBAColor $color, float $thickness, ?bool $enable = true)
    {
        $this->color = $color;
        $this->thickness = $thickness;
        $this->enable = $enable;
    }

    public function getOutlineThickness(): float
    {
        return $this->thickness;
    }

    public function setOutlineThickness(float $thickness): void
    {
        $this->thickness = $thickness;
    }

    public function isEnabled(): bool
    {
        return $this->enable;
    }

    public function enabled(bool $enable): void
    {
        $this->enable = $enable;
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