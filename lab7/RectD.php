<?php

class RectD
{
    /** @var float */
    public $left;
    /** @var float */
    public $top;
    /** @var float */
    public $width;
    /** @var float */
    public $height;

    /**
     * RectD constructor.
     * @param $left
     * @param $top
     * @param $width
     * @param $height
     */
    public function __construct(float $left, float $top, float $width, float $height)
    {
        $this->left = $left;
        $this->top = $top;
        $this->width = $width;
        $this->height = $height;
    }

    public function getTop(): float
    {
        return $this->top;
    }

    public function setTop(float $top): void
    {
        $this->top = $top;
    }

    public function getLeft(): float
    {
        return $this->left;
    }

    public function setLeft(float $left): void
    {
        $this->left = $left;
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function setHeight(float $height): void
    {
        $this->height = $height;
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function setWidth(float $width): void
    {
        $this->width = $width;
    }
}