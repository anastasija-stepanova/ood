<?php

class Document implements DocumentInterface
{

    const INDEX_HTML = "\\index.html";
    const IMAGE_FOLDER = "\\images\\";
    const PATH = __DIR__ . self::IMAGE_FOLDER;

    /** @var TextInterface */
    private $title = "";
    /** @var History */
    private $history;
    private $documentItems = [];
    /** @var ImageControllerInterface */
    private $imageController;

    public function __construct()
    {
        $this->imageController = new ImageController(self::PATH);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
        $this->history->addAndExecuteCommand(new ChangeStringCommand("", $title, $this->title));
    }

    public function canUndo(): bool
    {
        return $this->history->canUndo();
    }

    public function undo(): void
    {
        $this->history->undo();
    }

    public function canRedo(): bool
    {
        return $this->history->canRedo();
    }

    public function redo(): void
    {
        $this->history->redo();
    }

    public function insertParagraph(string $text, int $position): ParagraphInterface
    {
        $paragraph = new Paragraph($text, $this->history);
        if ($position < -1) {
            echo "Wrong position";
        }
        if ($position > count($this->documentItems)) {
            echo "Index out of bounds";
        }
        $this->history->addAndExecuteCommand(new InsertParagraphCommand($this->documentItems, $paragraph, $position));

        return $paragraph;
    }

    public function insertImage(string $path, int $width, int $height, int $position): ImageInterface
    {
        if ($position < -1) {
            echo "Wrong position";
        }
        if ($position > count($this->documentItems)) {
            echo "Index out of bounds";
        }
        $newFilePath = $this->imageController->add($path);
        $image = new Image($newFilePath, $width, $height, $this->history, $this->imageController);
        $this->history->addAndExecuteCommand(new InsertImageCommand($this->documentItems, $image, $position));

        return $image;
    }

    public function save(string $path): void
    {
        $this->imageController->removeUnusedImages($path, true);
        $directory = $path . self::INDEX_HTML;
//        $file = new File($directory);
        if (file_exists($directory)) {
            if (unlink($directory)) {
                echo "Delete the file: " . $directory;
            }
        }

        $fp = fopen($directory, "w");
        fwrite($fp,
            "<!DOCTYPE html><html><head><title>" . $this->escapeHtmlCharacters($this->getTitle()->getText()) . "</title></head><body>");
        foreach ($this->documentItems as $item) {
            $paragraph = $item->getParagraph();
            $image = $item->getImage();
            if ($paragraph != null) {
                fwrite($fp, "<p>" . $this->escapeHtmlCharacters($paragraph->getParagraphText()) . "</p>");
            } else {
                if ($image != null) {
                    fwrite($fp,
                        "<img src='" . $this->escapeHtmlCharacters($image->getPath()) . "\" width=\"" . $image->getWidth() . "\" height=\"" . $image->getHeight() . "\"/>");
                }
            }
        }
        fwrite($fp, "</body></html>");
        fclose($fp);
    }

    public function deleteItem(int $index): void
    {
        $this->history->addAndExecuteCommand(new DeleteItemCommand($index, $this->documentItems));
    }

    public function getDocumentItem(int $index): DocumentItem
    {
        return $this->documentItems[$index];
    }

    public function getItemsCount(): int
    {
        return count($this->documentItems);
    }

    private function escapeHtmlCharacters(string $text): string
    {
        $text = str_replace("&", "&amp;", $text);
        $text = str_replace("\'", "&apos;", $text);
        $text = str_replace("\"", "&quot;", $text);
        $text = str_replace(">", "&gt;", $text);
        $text = str_replace("<", "&lt;", $text);

        return $text;
    }
}