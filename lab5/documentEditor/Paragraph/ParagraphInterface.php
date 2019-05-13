<?php

interface ParagraphInterface
{
    public function getParagraphText(): string;
    public function setParagraphText(string $text): void;
}