<?php

class WalkCommand implements CommandInterface
{
    /** @var Robot */
    private $robot;
    /** @var string */
    private $direction;

    public function __construct(Robot $robot, string $direction)
    {
        $this->robot = $robot;
        $this->direction = $direction;
    }

    public function execute(): void
    {
        $this->robot->walk($this->direction);
    }
}