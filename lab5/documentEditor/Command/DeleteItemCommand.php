<?php

class DeleteItemCommand extends AbstractCommand
{
    /** @var array */
    private $items = [];
    /** @var int */
    private $position;
    /** @var DocumentItem */
    private $item;

    public function __construct(int $position, $items)
    {
        if ($position < -1) {
            echo "Wrong position";
        }
        $this->items = $items;
        $this->position = $position;
        $this->item = $items[$position];
    }

    public function execute()
    {
        if ($this->position == -1) {
            unset($this->items[count($this->items) - 1]);
        } else {
            unset($this->items[$this->position]);
        }
        $image = $this->item->getImage();
        if ($image != null) {
            $image->getController()->markForDeletion($image->getPath(), true);
        }
    }

    public function unexecute()
    {
        if ($this->position == -1) {
            $this->items [] = $this->item;
        } else {
            $this->items[$this->position] = $this->item;
        }
        $image = $this->item->getImage();
        if ($image != null) {
            $image->getController()->markForDeletion($image->getPath(), false);
        }
    }

    public function destroy()
    {
        /** @var Image */
        $image = $this->item->getImage();
        if ($image != null) {
            $image->getController()->delete($image->getPath());
        }
    }
}