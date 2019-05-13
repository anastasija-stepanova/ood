<?php

class ResizeImage extends Functions
{
    /** @var Document */
    private $document;
    const RESIZE_IMAGE = "ri";

    public function action()
    {
        $args = [];
        if (count($args) != 4) {
            $this->showErrorForCommand(self::RESIZE_IMAGE);

            return;
        }

        $position = $this->getPosition($args[1]);
        $width = $args[2];
        $height = $args[3];
        $item = $this->document->getDocumentItem($position);
        $image = $item->getImage();
        if ($image != null) {
            $image->resize($width, $height);
        } else {
            echo "Element with position number = " . $position . ". Is not a image";
        }
    }
}