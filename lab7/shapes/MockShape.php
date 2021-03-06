<?php

class MockShape implements ShapeInterface
{
    /** @var RectD */
    private $frame;
    /** @var StyleInterface */
    private $fillStyle;
    /** @var OutlineStyleInterface */
    private $outlineStyle;

    /**
     * MockShape constructor.
     * @param float|null $x
     * @param float|null $y
     * @param float|null $width
     * @param float|null $height
     */
    public function __construct(?float $x = null, ?float $y = null, ?float $width = null, ?float $height = null)
    {
        $point = new Point($x ?? 1, $y ?? 1);
        $this->frame = new RectD($point, $width ?? 10, $height ?? 10);
        $defaultColor = new RGBAColor(0, 0, 0, 0);
        $this->fillStyle = new FillStyle($defaultColor);
        $this->outlineStyle = new OutlineStyle($defaultColor, 1);
    }

    public function draw(CanvasInterface $canvas): void
    {
        echo 'Shape is drawing.';
    }

    public function getFrame(): RectD
    {
        return $this->frame;
    }

    public function setFrame(RectD $frame): void
    {
        $this->frame = $frame;
    }

    public function getOutlineStyle(): OutlineStyleInterface
    {
        return $this->outlineStyle;
    }

    public function getFillStyle(): StyleInterface
    {
        return $this->fillStyle;
    }

    public function getGroup(): ?GroupShapeInterface
    {
        return null;
    }
}