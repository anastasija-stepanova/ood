<?php

class Robot
{
    /** @var bool */
    private $turnedOn = false;
    /** @var string */
    private $direction = "";
    /** @var array */
    private $directions = ["north", "south", "west", "eas"];

    public function turnOn(): void
    {
        if (!$this->turnedOn) {
            $this->turnedOn = true;
            echo "It am waiting for your commands\n";
        }
    }

    public function turnOff(): void
    {
        if ($this->turnedOn) {
            $this->turnedOn = false;
            $this->direction = "";
            echo "It is a pleasure to serve you\n";
        }
    }

    public function walk(string $direction): void
    {
        if ($this->turnedOn) {
            if (in_array($direction, $this->directions)) {
                $this->direction = $direction;
            }
            echo "Walking " . $this->direction . "\n";
        } else {
            echo "The robot should be turned on first\n";
        }
    }

    public function stop(): void
    {
        if ($this->turnedOn) {
            if ($this->direction) {
                $this->direction = "";
                echo "Stopped\n";
            } else {
                echo "I am staying still\n";
            }
        } else {
            echo "The robot should be turned on first\n";
        }
    }
}