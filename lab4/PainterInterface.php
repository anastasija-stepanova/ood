<?php

interface PainterInterface
{
    public function drawPicture(PictureDraft $draft, CanvasInterface $canvas): void;
}