<?php
require_once("../inc.php");

final class CompositeTests extends \PHPUnit\Framework\TestCase
{
    public function test_insertIntoGroupAtIndex(): void
    {
        $shapeGroup = new GroupShape();
        $shapeGroup->insertShape(new MockShape());
        $shapeGroup->insertShape(new MockShape(), 1);
        $shapeGroup->insertShape(new MockShape(), 1);
        $shapeGroup->insertShape(new MockShape(), 2);
        $this->assertEquals($shapeGroup->getShapesCount(), 4);
    }

    public function test_removeShapeAtIndex(): void
    {
        $shapeGroup = new GroupShape();
        $shapeGroup->insertShape(new MockShape());
        $shapeGroup->insertShape(new MockShape(), 1);
        $this->assertEquals($shapeGroup->getShapesCount(), 2);
        $shapeGroup->removeShapeAtIndex(1);
        $this->assertEquals($shapeGroup->getShapesCount(), 1);
        $this->assertEquals($this->try_removeAtNoExitsIndex($shapeGroup), 1);
    }

    public function test_getFrameWhenAddedOneShape(): void
    {
        $shapeGroup = new GroupShape();
        $shapeGroup->insertShape(new MockShape());
        $this->assertEquals($shapeGroup->getShapesCount(), 1);
        $frame = $shapeGroup->getFrame();
        $leftTopPoint = $frame->getLeftTopPoint();
        $this->assertEquals($leftTopPoint->getX(), 1);
        $this->assertEquals($leftTopPoint->getY(), 1);
        $this->assertEquals($frame->getWidth(), 10);
        $this->assertEquals($frame->getHeight(), 10);
    }

    public function test_setFrameWhenAddedOneShape(): void
    {
        $shapeGroup = new GroupShape();
        $shapeGroup->insertShape(new MockShape());
        $point = new Point(10, 10);
        $width = 50;
        $height = 50;
        $newFrame = new RectD($point, $width, $height);
        $shapeGroup->setFrame($newFrame);
        $shape = $shapeGroup->getShapeAtIndex(0);
        $shapeFrame = $shape->getFrame();
        $leftTop = $shapeFrame->getLeftTopPoint();
        $this->assertEquals($leftTop->getX(), 10);
        $this->assertEquals($leftTop->getY(), 10);
        $this->assertEquals($shapeFrame->getWidth(), 50);
        $this->assertEquals($shapeFrame->getHeight(), 50);
    }

    public function test_getFrameWhenAddedMoreOneShape(): void
    {
        $shapeGroup = new GroupShape();
        $shapeGroup->insertShape(new MockShape(10, 50, 10, 10));
        $shapeGroup->insertShape(new MockShape(25, 65, 10, 10));
        $shapeGroup->insertShape(new MockShape(50, 45, 20, 20));
        $frame = $shapeGroup->getFrame();
        $leftTop = $frame->getLeftTopPoint();
        $this->assertEquals($leftTop->getX(), 10);
        $this->assertEquals($leftTop->getY(), 45);
        $this->assertEquals($frame->getHeight(), 30);
        $this->assertEquals($frame->getWidth(), 60);
    }

    public function test_setFrameWhenAddedMoreOneShape(): void
    {
        $shapeGroup = new GroupShape();
        $shapeGroup->insertShape(new MockShape(10, 50, 10, 10));
        $shapeGroup->insertShape(new MockShape(25, 65, 10, 10));
        $shapeGroup->insertShape(new MockShape(50, 45, 30, 50));
        $point = new Point(0, 5);
        $width = 30;
        $height = 25;
        $frame = new RectD($point, $width, $height);
        $shapeGroup->setFrame($frame);
        $shape = $shapeGroup->getShapeAtIndex(2);
        $frame = $shape->getFrame();
        $leftTop = $frame->getLeftTopPoint();
        $this->assertEquals($frame->getWidth(), 11.25);
        $this->assertEquals($frame->getHeight(), 14.29);
        $this->assertEquals($leftTop->getX(), 18.75);
        $this->assertEquals($leftTop->getY(), 15.71);
    }

    public function test_noSetFrameOfShapeWhenItIsInGroup(): void
    {
        $group = new MockShape(10, 50, 10, 10);
        $group->setFrame(new RectD(new Point(10, 10), 10, 20));
        $groupFrame = $group->getFrame();
        $shapeGroup = new GroupShape();

        $group->setFrame(new RectD(new Point(90, 90), 90, 90));
        $groupFrame = $group->getFrame();
        $shapeGroup->insertShape($group);
        $point = new Point(0, 5);
        $width = 30;
        $height = 25;
        $frame = new RectD($point, $width, $height);
        $shapeGroup->setFrame($frame);
        $leftTop = $frame->getLeftTopPoint();
        $pointShape = $groupFrame->getLeftTopPoint();
        $this->assertEquals($frame->getWidth(), 30);
        $this->assertEquals($frame->getHeight(), 25);
        $this->assertEquals($leftTop->getX(), 0);
        $this->assertEquals($leftTop->getY(), 5);
        $this->assertEquals($groupFrame->getWidth(), 30);
        $this->assertEquals($groupFrame->getHeight(), 25);
        $this->assertEquals($pointShape->getX(), 0);
        $this->assertEquals($pointShape->getY(), 5);
    }

    private function try_removeAtNoExitsIndex(GroupShape $shapeGroup): int
    {
        $code = 0;
        try {
            $shapeGroup->removeShapeAtIndex(10);
        } catch (\OutOfRangeException $e) {
            $code = 1;
        }

        return $code;
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

}