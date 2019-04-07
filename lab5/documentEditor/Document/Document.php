<?php

class Document implements DocumentInterface
{
    /** @var string */
    private $title;
    /** @var History */
    private $history;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function canUndo(): bool
    {
        return $this->history->canUndo();
    }

    public function undo(): void
    {
       $this->history->undo();
    }

    public function canRedo(): bool
    {
        return $this->history->canRedo();
    }

    public function redo(): void
    {
        $this->history->redo();
    }
}