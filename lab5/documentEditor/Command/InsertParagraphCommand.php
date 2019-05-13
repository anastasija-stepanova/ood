<?php

class InsertParagraphCommand extends AbstractCommand
{
    /** @var ParagraphInterface */
    private $paragraph;
    /** @var int */
    private $position;
    /** @var array */
    private $items = [];

    public function __construct($items, Paragraph $paragraph, int $position)
    {
        if ($position < -1) {
            echo "Wrong position";
        }
        $this->position = $position;
        $this->items = $items;
        $this->paragraph = $paragraph;
    }

    public function execute()
    {
        if ($this->position == -1) {
            $this->items[] = DocumentItem::create()->setParagraph($this->paragraph);
        } else {
            $this->items[$this->position] = DocumentItem::create()->setParagraph($this->paragraph);
        }
    }

    public function unexecute()
    {
        if ($this->position == -1) {
            unset($this->items[count($this->items) - 1]);
        } else {
            unset($this->items[$this->position]);
        }
    }

    public function destroy()
    {
        parent::destroy();
    }
}