<?php

interface MenuInterface
{
    public function addItem(string $shortcut, string $description, Functions $function): void;
    public function run(): void;
    public function showInstructions(): void;
    public function exit();
}