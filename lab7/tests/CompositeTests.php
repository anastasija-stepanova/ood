<?php
require_once("../inc.php");

final class CompositeTests extends \PHPUnit\Framework\TestCase
{
    /** @var GroupShape */
    private $groupShape;
    private $rect;
    private $fill;
    private $outline;
    /** @var Rectangle */
    private $rectangle;
    /** @var Style */
    private $rectFillStyle;
    /** @var Style */
    private $rectLineStyle;
    /** @var Triangle */
    private $triangle;
    /** @var Style */
    private $triangleFillStyle;
    /** @var Style */
    private $triangleLineStyle;

    public function test_groupIsEmpty()
    {
        self::assertEquals($this->groupShape->getShapesCount(), 0);
    }

    public function test_groupHasEmptyFrame()
    {
        $frame = $this->groupShape->getFrame();
        self::assertEquals(null, $frame->getLeft());
        self::assertEquals(null, $frame->getTop());
        self::assertEquals(null, $frame->getWidth());
        self::assertEquals(null, $frame->getHeight());
    }

    public function test_groupCanNotChangeFrame()
    {
        $this->groupShape->setFrame($this->rect);
        $frame = $this->groupShape->getFrame();
        self::assertEquals(null, $frame->getLeft());
        self::assertEquals(null, $frame->getTop());
        self::assertEquals(null, $frame->getWidth());
        self::assertEquals(null, $frame->getHeight());
    }

//    public function test_canNotRemoveShapeFromEmptyGroup()
//    {
//        $expected = "Can not remove element from empty group" . PHP_EOL;
//        self::assertEquals($expected, $this->groupShape->removeShapeAtIndex(0));
//    }

    public function test_canInsertShape()
    {
        $ellipse = new Ellipse($this->rect, $this->fill, $this->outline, 2);
        $this->groupShape->insertShape($ellipse, 0);
        self::assertEquals(1, $this->groupShape->getShapesCount());
    }

//    public function test_withCommonStyleReturnTheirCommonStyle()
//    {
//        $this->rectFillStyle->setColor(new RGBAColor(150, 150, 150, 1));
//		$this->triangleFillStyle->setColor(new RGBAColor(150, 150, 150, 1));
//
//		$this->groupShape->insertShape($this->rectangle, 0);
//		$this->groupShape->insertShape($this->triangle, 1);
//		$commonStyle = $this->groupShape->getFillStyle();
//
//		self::assertEquals(true, $commonStyle->isEnabled());
//    }

    public function test_getRightShapesCount()
    {
        $this->groupShape->insertShape($this->rectangle, 0);
		$this->groupShape->insertShape($this->triangle, 8);
		$this->groupShape->insertShape($this->triangle, 5);
		self::assertEquals(3, $this->groupShape->getShapesCount());
    }

//    public function test_changeFrameAfterChangingItsOwnFrame()
//    {
//        $rectFrame = $this->rectangle->getFrame();
//		$this->groupShape->insertShape($this->rectangle, 0);
//
//		$groupFrame = $this->groupShape->getFrame();
//		self::assertEquals($rectFrame->getTop(), $groupFrame->getTop());
//		self::assertEquals($rectFrame->getLeft(), $groupFrame->getLeft());
//		self::assertEquals($rectFrame->getWidth(), $groupFrame->getWidth());
//		self::assertEquals($rectFrame->getHeight(), $groupFrame->getHeight());

//		$newFrame = new RectD(5, 5, 400, 800);
//		$this->groupShape->setFrame($newFrame);
//
//		$groupFrame = $this->groupShape->getFrame();
//        self::assertEquals($groupFrame->getTop(), $newFrame->getTop());
//        self::assertEquals($groupFrame->getLeft(), $newFrame->getLeft());
//        self::assertEquals($groupFrame->getWidth(), $newFrame->getWidth());
//        self::assertEquals($groupFrame->getHeight(), $newFrame->getHeight());
//    }

    protected function setUp(): void
    {
        $this->groupShape = new GroupShape();
        $this->rect = new RectD(10, 10, 10, 10);
        $this->fill = new Style(true, new RGBAColor(250, 250, 250, 1));
        $this->outline = new Style(true, new RGBAColor(250, 250, 250, 1));
        $this->rectangle = new Rectangle($this->rect, $this->fill, $this->outline, 2);
        $this->rectFillStyle = $this->rectangle->getFillStyle();
        $this->rectLineStyle = $this->rectangle->getOutlineStyle();

        $this->triangle = new Triangle($this->rect, $this->fill, $this->outline, 2);
        $this->triangleFillStyle = $this->triangle->getFillStyle();
        $this->triangleLineStyle = $this->triangle->getOutlineStyle();
        parent::setUp();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

}