<?php

require_once("inc.php");

function createSlide(SlideInterface $slide)
{
    $circleFrame = new RectD(0, 0, 300, 300);
    $ellipse = new Ellipse($circleFrame, new Style(true, new RGBAColor(0, 0, 0, 0)),
        new Style(true, new RGBAColor(0, 0, 0, 0)), 1.0);
    $rectFrame = new RectD(0, 0, 580, 580);
    $rect = new Rectangle($rectFrame, new Style(false, new RGBAColor(0, 0, 0, 0)),
        new Style(true, new RGBAColor(0, 0, 0, 0)), 10.0);

    $group = new GroupShape();
    $group->insertShape($ellipse, 0);
    $group->insertShape($rect, 1);

//    $groupFrame = new RectD(0.0, 0.0, 300, 300);
//    $group->setFrame($groupFrame);
//    $shapes = $slide->getShapes();
    $slide->add($group);
}

function main()
{
    $canvas = new Canvas();
    $slide = new Slide(800.0, 600.0);
    createSlide($slide);
    $slide->draw($canvas);
    $canvasSvg = new CanvasSvg();
    $canvasSvg->setFillColor("#000000");
    $canvasSvg->setOutlineColor("#000000");
    $canvasSvg->drawEllipse(new Point(5, 5), 8, 8);
    $canvasSvg->setFillColor("#007548");
    $canvasSvg->setOutlineColor("#007548");
    $canvasSvg->drawLine(new Point(10, 10), new Point(20, 20));
    $canvasSvg->drawLine(new Point(20, 20), new Point(30, 10));
    $canvasSvg->drawLine(new Point(30, 10), new Point(10, 10));
    $canvasSvg->setFillColor("#f5f5f5");
    $canvasSvg->setOutlineColor("#f5f5f5");
    $canvasSvg->drawLine(new Point(40, 5), new Point(90, 5));
    $canvasSvg->drawLine(new Point(90, 5), new Point(90, 60));
    $canvasSvg->drawLine(new Point(90, 60), new Point(40, 60));
    $canvasSvg->drawLine(new Point(40, 60), new Point(40, 5));
}

main();