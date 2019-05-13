<?php

class Redo extends Functions
{
    /** @var Document */
    private $document;
    const REDO = "Redo";

    public function action()
    {
        $args = [];
        if (count($args) != 1) {
            $this->showErrorForCommand(self::REDO);

            return;
        }

        if ($this->document->canRedo()) {
            $this->document->redo();
        } else {
            echo "Can't redo";
        }
    }
}