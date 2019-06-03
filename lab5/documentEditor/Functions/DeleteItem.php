<?php

class DeleteItem extends Functions
{
    /** @var Document */
    private $document;
    const DELETE_ITEM = "di";

    public function action($argv, $argc)
    {
        if (count($argc) != 2) {
            $this->showErrorForCommand(self::DELETE_ITEM);

            return;
        }

        $position = $this->getPosition($argv[1]);
        $this->document->deleteItem($position);
    }
}