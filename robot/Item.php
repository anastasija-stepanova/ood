<?php

class Item
{
    /** @var string */
    private $shortcut;
    /** @var string */
    private $description;
    /** @var CommandInterface */
    private $command;

    /**
     * Item constructor.
     * @param string $shortcut
     * @param string $description
     * @param CommandInterface $command
     */
    public function __construct(string $shortcut, string $description, CommandInterface $command)
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