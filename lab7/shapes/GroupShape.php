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
    private $shapes = [];

    public function getFrame(): RectD
    {
        $frame = new RectD(null, null, null, null);
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

        if ($oldFrame == null) {
            return;
        }

        $frame = new RectD(null, null, null, null);
        if ($oldFrame->getWidth() == null || $oldFrame->getHeight() == null) {
            return;
        }
        $scaleX = $frame->getWidth() / $oldFrame->getWidth();
        $scaleY = $frame->getHeight() / $oldFrame->getHeight();

        foreach ($this->shapes as $shape) {
            $shapeFrame = $shape->getFrame();

            $offsetX = $shapeFrame->getLeft() - $oldFrame->getLeft();
            $offsetY = $shapeFrame->getTop() - $oldFrame->getTop();

            $shapeFrame->setLeft($frame->getLeft() + $offsetX * $scaleX);
            $shapeFrame->setTop($frame->getTop() + $offsetY * $scaleY);
            $shapeFrame->setWidth($shapeFrame->getWidth() * $scaleX);
            $shapeFrame->setHeight($shapeFrame->getHeight() * $scaleY);
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
        if (count($this->shapes) == 0) {
            echo "Can not remove element from empty group" . PHP_EOL;
        }
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