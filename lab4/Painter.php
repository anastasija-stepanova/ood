<?php

class Painter implements PainterInterface
{
    public function drawPicture(PictureDraft $draft, CanvasInterface $canvas): void
    {
        foreach ($draft->getShapes() as $shape)
        {
            $shape->draw($canvas);
        }
    }
}