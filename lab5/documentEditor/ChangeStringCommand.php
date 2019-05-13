<?php

class ChangeStringCommand implements CommandInterface
{
    private $target;
    private $newValue;
    private $text;

    public function __construct(string $target, string $newValue, TextInterface $text)
    {
        $this->target = $target;
        $this->newValue = $newValue;
        $this->text = $text;
    }

    public function execute(): void
    {
        $this->text->setText($this->newValue);
    }

    public function unexecute(): void
    {
        $this->text->setText($this->target);
    }

    public function destroy(): void
    {

    }
}