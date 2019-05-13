<?php

class InsertParagraph extends Functions
{
    /** @var Document */
    private $document;
    const INSERT_PARAGRAPH = "ip";

    public function action()
    {
        $args = [];
        if (count($args) < 3) {
            $this->showErrorForCommand(self::INSERT_PARAGRAPH);

            return 1;
        }
        $position = $this->getPosition($args[1]);
        $text = implode(" ", array_slice($args, 2, count($args)));

        return $this->document->insertParagraph($text, $position);
    }
}