<?php

class GroupShape implements ShapesInterface, ShapeInterface
{
    /** @var Style */
    private $outlineStyle;
    /** @var Style */
    private $fillStyle;
    /** @var float */
    private $lineThickness;
    /** @var Shape[] */
    private $shapes;

    public function __construct(Style $outlineStyle, Style $fillStyle, float $thickness)
    {
        $this->outlineStyle = $outlineStyle;
        $this->fillStyle = $fillStyle;
        $this->lineThickness = $thickness;
    }

    public function getFrame(): RectD
    {
        $frame = new RectD(INF, INF, -INF, -INF);
        $maxRight = 0;
        $maxBottom = 0;

        foreach ($this->shapes as $shape) {
            $shapeFrame = $shape->getFrame();
            $frame->setLeft(min($shapeFrame->getLeft(), $frame->getLeft()));
            $frame->setTop(min($shapeFrame->getTop(), $frame->getTop()));
            $maxRight = max($shapeFrame->getWidth() . $shapeFrame->getLeft(), $maxRight);
            $maxBottom = max($shapeFrame->getHeight() . $shapeFrame->getTop(), $maxBottom);
        }

        $frame->setWidth($maxRight - $frame->getLeft());
        $frame->setHeight($maxBottom - $frame->getTop());

        return $frame;
    }

    public function setFrame(RectD $rect): void
    {
        $oldFrame = $this->getFrame();

        $frame = new RectD(INF, INF, -INF, -INF);
        $diffX = $frame->getWidth() / $oldFrame->getWidth();
        $diffY = $frame->getHeight() / $oldFrame->getHeight();

        foreach ($this->shapes as $shape) {
            $shapeFrame = $shape->getFrame();

            $offsetX = $shapeFrame->getLeft() - $oldFrame->getLeft();
            $offsetY = $shapeFrame->getTop() - $oldFrame->getTop();

            $shapeFrame->setLeft($frame->getLeft() + $offsetX * $diffX);
            $shapeFrame->setTop($frame->getTop() + $offsetY * $diffY);
            $shapeFrame->setWidth($shapeFrame->getWidth() * $diffX);
            $shapeFrame->setHeight($shapeFrame->getHeight() * $diffY);
        }
    }

    public function getOutlineStyle(): StyleInterface
    {
        return $this->outlineStyle;
    }

    public function getFillStyle(): StyleInterface
    {
       return $this->fillStyle;
    }

    public function getShapesCount(): int
    {
        return count($this->shapes);
    }

    public function insertShape(ShapeInterface $shape, int $position)
    {
        $this->shapes[$position] = $shape;
    }

    public function getShapeAtIndex(int $index): ShapeInterface
    {
        return $this->shapes[$index] = null;
    }

    public function removeShapeAtIndex(int $index): void
    {
        unset($this->shapes[$index]);
    }

    public function draw(Canvas $canvas): void
    {
        foreach ($this->shapes as $shape) {
            $shape->draw($canvas);
        }
    }

    public function getLineThickness(): float
    {
        return $this->lineThickness;
    }

    public function setLineThickness(float $lineThickness): void
    {
        $this->lineThickness = $lineThickness;
        foreach ($this->shapes as $shape) {
            $shape->setLineThickness($this->lineThickness);
        }
    }

    public function setFillStyle(Style $fillStyle): void
    {
        $this->fillStyle = $fillStyle;
        foreach ($this->shapes as $shape) {
            $shape->setFillStyle($this->fillStyle);
        }
    }
}