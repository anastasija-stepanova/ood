<?php

interface TextInterface
{
    public function setText(string $text): void;
    public function getText(): string;
}