<?php

namespace Command;

use Document\DocumentInterface;
use Exporter\HtmlExporter;
use ImageController\ImageControllerInterface;

class ListCommand implements CommandInterface
{
    const FILE_NAME = 'index.html';
    const IMAGE_DIRECTORY = 'images';
    /** @var DocumentInterface */
    private $document;
    /** @var string */
    private $path;
    /** @var ImageControllerInterface */
    private $imageController;

    public function __construct(DocumentInterface $document, ImageControllerInterface $controller)
    {
        $this->document = $document;
        $this->imageController = $controller;
    }

    public function execute(): void
    {
        $filePath = $this->path . '/' . self::FILE_NAME;
        $exporter = new HtmlExporter();
        $htmlDocument = $exporter->export($this->document);

        echo "***";
        echo file_get_contents($filePath, $htmlDocument);
    }

    public function unexecute(): void
    {

    }
}