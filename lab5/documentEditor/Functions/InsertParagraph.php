<?php

class InsertParagraph extends Functions
{
    /** @var Document */
    private $document;
    const INSERT_PARAGRAPH = "ip";

    public function action($argv, $argc)
    {
        $position = $this->getPosition($argv[1]);
        $text = implode(" ", array_slice($argv, 2, $argc));

        return $this->document->insertParagraph($text, $position);
    }
}