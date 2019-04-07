<?php

class Image implements ImageInterface
{
    private $path;
    private $width;
    private $height;
    private const MAX_SIZE = 10000;
    private const MIN_SIZE = 1;

    public function __construct(string $path, int $width, int $height)
    {
        $this->path = $path;
        $this->width = $width;
        $this->height = $height;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getWidth(): int
    {
        return $this->height;
    }

    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

    public function resize(int $width, int $height): void
    {
        $this->checkImageSize($width, $height);
        this.executor.addAndExecuteCommand(new ResizeImageCommand(this, this.width, this.height, newWidth, newHeight));
    }

    private function checkImageSize(int $width, int $height): void
    {
        if ($width < self::MIN_SIZE || $width > self::MAX_SIZE) {
            echo "Invalid image width";
        }
        if ($height < self::MIN_SIZE || $height > self::MAX_SIZE) {
            echo "Invalid image height";
        }
    }
}