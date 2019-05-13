<?php

class Save extends Functions
{
    /** @var Document */
    private $document;
    const SAVE = "Save";

    public function action()
    {
        $args = [];
        if (count($args) != 2) {
            $this->showErrorForCommand(self::SAVE);

            return;
        }

        $this->document->save($args[1]);
    }
}