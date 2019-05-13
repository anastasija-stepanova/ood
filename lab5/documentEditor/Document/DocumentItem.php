<?php

class DocumentItem extends ConstDocumentItem
{

    /** @var ImageInterface */
    private $image = null;
    /** @var ParagraphInterface */
    private $paragraph = null;

    public function __construct()
    {
    }

    public static function create()
    {
        $instance = new self();

        return $instance;
    }

    public function setParagraph(ParagraphInterface $paragraph)
    {
        $this->paragraph = $paragraph;

        return $this;
    }

    public function setImage(ImageInterface $image)
    {
        $this->image = $image;

        return $this;
    }

    public function getImage(): ImageInterface
    {
        parent::getImage();
    }

    public function getParagraph(): ParagraphInterface
    {
        parent::getParagraph();
    }
}