<?php

interface ImageControllerInterface
{
    public function setDirectory(string $directory): void;
    public function add(string $path): string;
    public function remove(string $path): void;
    public function removeUnusedImages(string $path, bool $remove):void;
    public function getImagesToRemove(): array;
}