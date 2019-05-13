<?php

class ShowDocument extends Functions
{
    /** @var Document */
    private $document;
    const LIST = "List";

    public function action()
    {
        $args = [];
        if (count($args) != 1) {
            $this->showErrorForCommand(self::LIST);

            return;
        }
        echo "---------------------Elements---------------------";
        echo "Title: " . $this->document->getTitle()->getText();

        for ($i = 0; $i < $this->document->getItemsCount(); ++$i) {
            echo $i . ". ";
            $item = $this->document->getDocumentItem($i);
            $image = $item->getImage();
            $paragraph = $item->getParagraph();

            if ($image != null) {
                echo "Image: " . $image->getWidth() . " " . $image->getHeight() . " " . $image->getPath();
            } else {
                if ($paragraph != null) {
                    echo "Paragraph: " . $paragraph->getText();
                }
            }
        }
        echo "--------------------------------------------------";
    }
}