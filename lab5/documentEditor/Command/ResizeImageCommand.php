<?php

class ResizeImageCommand extends AbstractCommand
{
    private $image;
    private $newWidth;
    private $newHeight;
    private $oldWidth;
    private $oldHeight;

    public function __construct(Image $image, int $oldWidth, int $oldHeight, int $newWidth, int $newHeight)
    {
        $this->image = $image;
        $this->newHeight = $newHeight;
        $this->newWidth = $newWidth;
        $this->oldHeight = $oldHeight;
        $this->oldWidth = $oldWidth;
    }

    public function execute()
    {
        $this->image->setWidth($this->newWidth);
        $this->image->setHeight($this->newHeight);
    }

    public function unexecute()
    {
        $this->image->setWidth($this->oldWidth);
        $this->image->setHeight($this->oldHeight);
    }

    public function destroy()
    {

    }
}