<?php

class GroupShape implements GroupShapeInterface
{
    /** @var ShapeInterface[] */
    private $shapes;
    /** @var OutlineStyleInterface */
    private $groupOutlineStyle;
    /** @var GroupFillStyle */
    private $groupFillStyle;

    public function __construct()
    {
        $this->shapes = [];
        $this->groupFillStyle = new GroupFillStyle(new GroupFillStyleEnumerator($this->shapes));
        $this->groupOutlineStyle = new GroupOutlineStyle(new GroupOutlineStyleEnumerator($this->shapes));
    }

    public function getShapesCount(): int
    {
        return count($this->shapes);
    }

    public function getShapeAtIndex(int $index): ?ShapeInterface
    {
        return $this->shapes[$index] ?? null;
    }

    public function insertShape(ShapeInterface $shape, ?int $position = null): void
    {
        if (!isset($position)) {
            array_push($this->shapes, $shape);

            return;
        }
        if ($position < 0) {
            throw new \OutOfRangeException(sprintf('The index %d is out range shape collection', $position));
        }
        $this->shapes = array_merge(
            array_slice($this->shapes, 0, $position),
            [$shape],
            array_slice($this->shapes, $position, count($this->shapes))
        );
    }

    public function removeShapeAtIndex(int $index): void
    {
        if (!isset($this->shapes[$index])) {
            throw new \OutOfRangeException('It\'s impossible to remove shape');
        }
        unset($this->shapes[$index]);
        array_values($this->shapes);
    }

    public function getFrame(): RectD
    {
        if ($this->getShapesCount() == 0) {
            return new RectD(new Point(null, null), null, null);
        }
        $minX = PHP_INT_MAX;
        $minY = PHP_INT_MAX;
        $maxX = PHP_INT_MIN;
        $maxY = PHP_INT_MIN;
        foreach ($this->shapes as $position => $shape) {
            $oldFrameShape = $this->shapes[$position]->getFrame();
            $minX = min($minX, $oldFrameShape->getLeftTopPoint()->getX());
            $maxX = max($maxX, $oldFrameShape->getLeftTopPoint()->getX() + $oldFrameShape->getWidth());
            $minY = min($minY, $oldFrameShape->getLeftTopPoint()->getY());
            $maxY = max($maxY, $oldFrameShape->getLeftTopPoint()->getY() + $oldFrameShape->getHeight());
        }

        return new RectD(new Point($minX, $minY), $maxX - $minX, $maxY - $minY);
    }

    public function setFrame(RectD $frame): void
    {
        foreach ($this->shapes as $position => $shape) {
            $newShapeFrame = $this->getNewShapeFrame($shape, $frame);
            $shape->setFrame($newShapeFrame);
        }
    }

    public function getOutlineStyle(): OutlineStyleInterface
    {
        return $this->groupOutlineStyle;
    }

    public function getFillStyle(): StyleInterface
    {
        return $this->groupFillStyle;
    }

    public function getGroup(): ?GroupShapeInterface
    {
        return $this;
    }

    public function draw(CanvasInterface $canvas): void
    {
        $canvas->setOutlineThickness($this->getOutlineStyle()->getOutlineThickness());
        $canvas->setOutlineColor($this->getOutlineStyle()->getColor());
        $canvas->setFillColor($this->getFillStyle()->getColor());
        foreach ($this->shapes as $shape) {
            $shape->draw($canvas);
        }
    }

    private function getNewShapeFrame(ShapeInterface $shape, RectD $frame): RectD
    {
        $oldGroupFrame = $this->getFrame();
        $oldGroupFrameLeftTop = $oldGroupFrame->getLeftTopPoint();
        $leftTop = $frame->getLeftTopPoint();
        $oldShapeFrame = $shape->getFrame();
        $oldShapeFrameLeftTop = $oldShapeFrame->getLeftTopPoint();
        $newX = $leftTop->getX() + ($oldShapeFrameLeftTop->getX() - $oldGroupFrameLeftTop->getX()) * ($frame->getWidth() / $oldGroupFrame->getWidth());
        $newY = $leftTop->getY() + ($oldShapeFrameLeftTop->getY() - $oldGroupFrameLeftTop->getY()) * ($frame->getHeight() / $oldGroupFrame->getHeight());
        $newLeftTop = new Point($newX, $newY);
        $newWidth = $oldShapeFrame->getWidth() * $frame->getWidth() / $oldGroupFrame->getWidth();
        $newHeight = $oldShapeFrame->getHeight() * $frame->getHeight() / $oldGroupFrame->getHeight();

        return new RectD($newLeftTop, $newWidth, $newHeight);
    }
}