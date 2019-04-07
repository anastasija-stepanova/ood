<?php

interface HistoryInterface
{
    public function __construct();
    public function canRedo(): bool;
    public function redo(): void;
    public function canUndo(): bool;
    public function undo(): void;
    public function addAndExecuteCommand(CommandInterface $command): void;
}