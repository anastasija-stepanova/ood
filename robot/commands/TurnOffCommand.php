<?php

class TurnOffCommand implements CommandInterface
{
    /** @var Robot */
    private $robot;

    public function __construct(Robot $robot)
    {
        $this->robot = $robot;
    }

    public function execute(): void
    {
        $this->robot->turnOff();
    }
}