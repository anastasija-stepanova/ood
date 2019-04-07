<?php

interface MenuInterface
{
    public function addItem(string $shortcut, string $description, CommandInterface $command): void;
    public function run(): void;
    public function showInstructions(): void;
    public function exit();
}