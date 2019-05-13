<?php

class SetTitle extends Functions
{
    /** @var Document */
    private $document;
    const SET_TITLE = "st";

    public function action()
    {
        $args = [];
        if (count($args) < 2) {
            $this->showErrorForCommand(self::SET_TITLE);

            return;
        }
        $text = implode(" ", array_slice($args, 1, count($args)));
        $this->document->setTitle($text);
    }
}