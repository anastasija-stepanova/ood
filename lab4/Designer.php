<?php

class Designer implements DesignerInterface
{
    private $factory;

    public function __construct(ShapeFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createDraft($inputData): PictureDraft
    {
        // TODO: Implement createDraft() method.
    }
}