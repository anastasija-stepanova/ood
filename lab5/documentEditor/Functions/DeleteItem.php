<?php

class DeleteItem extends Functions
{
    /** @var Document */
    private $document;
    const DELETE_ITEM = "di";

    public function action()
    {
        $args = [];
        if (count($args) != 2) {
            $this->showErrorForCommand(self::DELETE_ITEM);

            return;
        }

        $position = $this->getPosition($args[1]);
        $this->document->deleteItem($position);
    }
}