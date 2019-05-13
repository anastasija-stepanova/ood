<?php

class Paragraph implements ParagraphInterface
{
    private $text;
    private $executor;

    public function __construct(string $text, Executor $executor)
    {
        $this->text = $text;
        $this->executor = $executor;
    }

    public function getParagraphText(): string
    {
        return $this->text;
    }

    public function setParagraphText(string $text): void
    {
        $this->executor->addAndExecuteCommand(new ChangeStringCommand($this->text, $text, $this));
    }

    public function setText(string $text)
    {
        $this->text = $text;
    }

    public function getText(): string
    {
        return $this->text;
    }
}