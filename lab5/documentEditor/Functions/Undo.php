<?php

class Undo extends Functions
{
    /** @var Document */
    private $document;
    const UNDO = "Undo";

    public function action()
    {
        $args = [];
        if (count($args) != 1) {
            $this->showErrorForCommand(self::UNDO);

            return;
        }

        if ($this->document->canUndo()) {
            $this->document->undo();
        } else {
            echo "Can't undo";
        }
    }
}