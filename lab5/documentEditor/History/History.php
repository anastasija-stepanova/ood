<?php

class History implements HistoryInterface
{
    private $commands = [];
    private $nextCommandIndex;

    public function __construct()
    {
    }

    public function canRedo(): bool
    {
        return $this->nextCommandIndex != count($this->commands);
    }

    public function redo(): void
    {
        if ($this->canRedo()) {
            $this->commands[$this->nextCommandIndex]->execute(); // может выбросить исключение
            ++$this->nextCommandIndex;
        }
    }

    public function canUndo(): bool
    {
        return $this->nextCommandIndex != 0;
    }

    public function undo(): void
    {
        if ($this->canUndo()) {
            $this->commands[$this->nextCommandIndex - 1]->unexecute();
            --$this->nextCommandIndex;
        }
    }

    public function addAndExecuteCommand(CommandInterface $command): void
    {
        if ($this->nextCommandIndex < count($this->commands)) {
            $command->execute();
            ++$this->nextCommandIndex;
            $this->commands [] = $command;
        } else {
            assert($this->nextCommandIndex == count($this->commands));
            $this->commands [] = null;

            try {
                $command->execute();
                $this->commands [] = $command;
                ++$this->nextCommandIndex;
            } catch (Exception $exception) {
                array_pop($this->commands);
                echo (string)$exception;
            }
        }
    }

}