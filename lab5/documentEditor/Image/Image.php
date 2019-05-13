<?php

class Image implements ImageInterface
{
    private $path;
    private $width;
    private $height;
    /** @var Executor */
    private $executor;
    /** @var ImageControllerInterface */
    private $imageController;
    private const MAX_SIZE = 10000;
    private const MIN_SIZE = 1;

    public function __construct(string $path, int $width, int $height, Executor $executor, ImageControllerInterface $controller)
    {
        $this->path = $path;
        $this->width = $width;
        $this->height = $height;
        $this->executor = $executor;
        $this->imageController = $controller;
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
        $this->executor->addAndExecuteCommand(new ResizeImageCommand($this, $this->width, $this->height, $width,
            $height));
    }

    public function getController(): ImageControllerInterface
    {
        return $this->imageController;
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