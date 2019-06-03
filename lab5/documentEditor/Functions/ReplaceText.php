<?php

class ReplaceText extends Functions
{
    /** @var Document */
    private $document;
    const REPLACE_TEXT = "rt";

    public function action($argv, $argc)
    {
        if (count($argc) < 3) {
            $this->showErrorForCommand(self::REPLACE_TEXT);

            return;
        }

        $position = $this->getPosition($argv[1]);
        $item = $this->document->getDocumentItem($position);
        $paragraph = $item->getParagraph();
        if ($paragraph != null) {
            $text = implode(" ", array_slice($argv, 2, $argc));
            $paragraph->setText($text);
        } else {
            echo "Element with position number = " . $position . ". Is not a paragraph";
        }
    }
}