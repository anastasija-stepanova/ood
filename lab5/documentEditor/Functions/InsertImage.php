<?php

class InsertImage extends Functions
{
    /** @var Document */
    private $document;
    const INSERT_IMAGE = "ii";

    public function action()
    {
        $args = [];
        if (count($args) != 5) {
            $this->showErrorForCommand(self::INSERT_IMAGE);

            return;
        }
        $position = $this->getPosition($args[1]);
        $width = $args[2];
        $height = $args[3];
        $this->document->insertImage($args[4], $width, $height, $position);
    }
}