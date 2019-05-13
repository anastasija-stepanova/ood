<?php

abstract class Shape implements ShapeInterface
{
    /** @var RectD */
    private $frame;
    /** @var Style */
    private $fillStyle;
    /** @var Style */
    private $outlineStyle;
    /** @var float */
    private $lineThickness;

    /**
     * Shape constructor.
     * @param RectD $frame
     * @param Style $fillStyle
     * @param Style $outlineStyle
     * @param float $lineThickness
     */
    public function __construct(RectD $frame, Style $fillStyle, Style $outlineStyle, float $lineThickness)
    {
        $this->frame = $frame;
        $this->fillStyle = $fillStyle;
        $this->outlineStyle = $outlineStyle;
        $this->lineThickness = $lineThickness;
    }

    public function getFrame(): RectD
    {
        return $this->frame;
    }

    public function setFrame(RectD $rect): void
    {
        $this->frame = $rect;
    }

    public function getOutlineStyle(): StyleInterface
    {
        return $this->outlineStyle;
    }

    public function setOutlineStyle(StyleInterface $outlineStyle): void
    {
        $this->outlineStyle = $outlineStyle;
    }

    public function getFillStyle(): StyleInterface
    {
        return $this->fillStyle;
    }

    public function setFillStyle(StyleInterface $fillStyle): void
    {
        $this->fillStyle = $fillStyle;
    }

    public function getLineThickness(): float
    {
        return $this->lineThickness;
    }

    public function setLineThickness(float $lineThickness): void
    {
        $this->lineThickness = $lineThickness;
    }

    public function draw(CanvasInterface $canvas): void
    {
        try {
            if ($this->fillStyle->isEnabled()) {
                $canvas->beginFill($this->fillStyle->getColor());
            } else {
                $canvas->setFillColor(new RGBAColor(0, 0, 0, 0));
            }

            if ($this->outlineStyle->isEnabled()) {
                $canvas->setLineColor($this->outlineStyle->getColor());
            } else {
                $canvas->setLineColor(new RGBAColor(0, 0, 0, 0));
            }

            $canvas->setLineThickness($this->lineThickness);
            $this->drawBehavior($canvas);

            if ($this->fillStyle->isEnabled()) {
                $canvas->endFill();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public abstract function drawBehavior(CanvasInterface $canvas): void;
}