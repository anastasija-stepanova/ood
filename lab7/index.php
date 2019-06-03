<?php

require_once("inc.php");

function run(): void
{
    $slide = createSlide();
    $canvas = new CanvasSvg();
    $slide->draw($canvas);
}

function createSlide(): SlideInterface
{
    $slide = new Slide(800, 600);
    $home = createHome();
    $slide->addShape($home);

    return $slide;
}

function createHome(): ShapeInterface
{
    $roof = new Triangle(new Point(300, 50), new Point(150, 130), new Point(450, 130));
    $roof->getFillStyle()->setColor(new RGBAColor(75, 105, 51));
    $roof->getOutlineStyle()->setOutlineThickness(5);
    $roof->getOutlineStyle()->setColor(new RGBAColor(150, 100, 10));
    $base = new Rectangle(new Point(175, 135), 250, 200);
    $home = new GroupShape();
    $home->insertShape($roof);
    $home->insertShape($base);
    $home->setFrame(new RectD(new Point(100, 100), 200, 100));

    return $home;
}
