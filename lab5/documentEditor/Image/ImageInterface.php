<?php

interface ImageInterface
{
    public function __construct(string $path, int $width, int $height, Executor $executor, ImageControllerInterface $controller);
    public function getPath(): string;
    public function getHeight(): int;
    public function getWidth(): int;
    public function setHeight(int $height): void;
    public function setWidth(int $width): void;
    public function resize(int $width, int $height): void;
}