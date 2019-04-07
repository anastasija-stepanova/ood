<?php

class Item
{
    private $shortcut;
    private $description;
    private $command;

    /**
     * Item constructor.
     * @param $shortcut
     * @param $description
     * @param $command
     */
    public function __construct($shortcut, $description, $command)
    {
        $this->shortcut = $shortcut;
        $this->description = $description;
        $this->command = $command;
    }

    /**
     * @return string
     */
    public function getShortcut(): string
    {
        return $this->shortcut;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return CommandInterface
     */
    public function getCommand(): CommandInterface
    {
        return $this->command;
    }
}