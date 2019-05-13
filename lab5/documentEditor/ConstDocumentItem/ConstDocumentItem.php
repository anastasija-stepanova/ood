<?php

class ConstDocumentItem implements ConstDocumentItemInterface
{
    /** @var ImageInterface */
    private $image = null;
    /** @var ParagraphInterface */
    private $paragraph = null;

    public function getImage(): ImageInterface
    {
        return $this->image;
    }

    public function getParagraph(): ParagraphInterface
    {
        return $this->paragraph;
    }
}