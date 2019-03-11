<?php

interface DesignerInterface
{
//    public function Designer(ShapeFactoryInterface $factory);

    public function createDraft($inputData): PictureDraft;
}