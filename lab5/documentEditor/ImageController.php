<?php

class ImageController implements ImageControllerInterface
{
    private $directory;

    private $imagesToRemove = [];

    public function __construct(string $path)
    {
        $this->directory = $path;
        $this->checkDirectory();
    }

    public function setDirectory(string $directory): void
    {
        $this->directory = $directory;
    }

    public function add(string $path): string
    {
        if (!file_exists($path) || is_dir($path)) {
            echo "Incorrect file path: " . $path;
        }
        $fileExtension = pathinfo($path, PATHINFO_EXTENSION);
        $uniqueFileName = uniqid();
        $newFilePath = $this->directory . $uniqueFileName . "." . $fileExtension;
//        $newFile = new File($newFilePath);
//        copyFileUsingChannel(file, newFile);

        return $newFilePath;
    }

    public function remove(string $path): void
    {
        if (!file_exists($path)) {
            return;
        }
        if (is_dir($path)) {
            echo "Incorrect file path: " . $path;
        }
        if (unlink($path)) {
            echo "Successfully delete: " . $path;
        } else {
            echo "Deletion didn't happen: " . $path;
        }
    }

    public function removeUnusedImages(string $path, bool $remove): void
    {
        if ($remove) {
            $this->imagesToRemove [] = $path;
        } else {
            if (in_array($path, $this->imagesToRemove)) {
                foreach ($this->imagesToRemove as $value) {
                    if ($value == $path) {
                        unset($path);
                    }
                }
            }
        }
    }

    public function getImagesToRemove(): array
    {
        return $this->imagesToRemove;
    }

    private function checkDirectory(): void
    {
        if (!file_exists($this->directory)) {
            echo "Create the directory: " . $this->directory;
        }
    }
}