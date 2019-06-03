<?php

class InsertImage extends Functions
{
    /** @var Document */
    private $document;
    const INSERT_IMAGE = "ii";

    public function action($argv, $argc)
    {
        if (count($argc) != 5) {
            $this->showErrorForCommand(self::INSERT_IMAGE);

            return;
        }
        $position = $this->getPosition($argv[1]);
        $width = $argv[2];
        $height = $argv[3];
        $this->document->insertImage($argv[4], $width, $height, $position);
    }
}