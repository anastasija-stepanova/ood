<?php

class ReplaceText extends Functions
{
    /** @var Document */
    private $document;
    const REPLACE_TEXT = "rt";

    public function action()
    {
        $args = [];
        if (count($args) < 3) {
            $this->showErrorForCommand(self::REPLACE_TEXT);

            return;
        }

        $position = $this->getPosition($args[1]);
        $item = $this->document->getDocumentItem($position);
        $paragraph = $item->getParagraph();
        if ($paragraph != null) {
            $text = implode(" ", array_slice($args, 2, count($args)));
            $paragraph->setText($text);
        } else {
            echo "Element with position number = " . $position . ". Is not a paragraph";
        }
    }
}