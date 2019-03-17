<?php

require_once("include/inc.php");

function execute(): void
{
    try {
        $factory = new ShapeFactory();
        $designer = new Designer($factory);
        $canvas = new Canvas();
        $client = new Client($canvas);
        $painter = new Painter();
        $client->getPicture($designer);
        $client->drawPicture($painter);
    } catch (\Exception $exception) {
        echo (string)$exception;
    }
}

execute();