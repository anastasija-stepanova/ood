<?php

interface DocumentInterface
{
    public function getTitle(): string;
    public function setTitle(string $title): void;
    public function canUndo(): bool;
    public function undo(): void;
    public function canRedo(): bool;
    public function redo(): void;
}