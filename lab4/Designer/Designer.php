<?php

class Designer implements DesignerInterface
{
    private $factory;

    public function __construct(ShapeFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createDraft(): PictureDraft
    {
        $this->printHelp();
        $pictureDraft = new PictureDraft();
        $isProcessed = true;
        while ($isProcessed) {
            $isProcessed = $this->process($pictureDraft);
        }

        return $pictureDraft;
    }

    private function printHelp(): void
    {
        echo "Help: \n";
        echo "Colors: green, red, blue, yellow, pink, black \n";
        echo "Ellipse <centerX> <centerY> <horizontalRadius> <verticalRadius> <color> \n";
        echo "Rectangle <leftTop.x> <leftTop.y> <rightBottom.x> <rightBottom.y> <color> \n";
        echo "Triangle <vertex1.x> <vertex1.y> <vertex2.x> <vertex2.y> <vertex3.x> <vertex3.y> <color> \n";
        echo "Polygon <centerX> <centerY> <vertexCount> <radius> <color> \n";
    }

    private function process(PictureDraft $pictureDraft): bool
    {
        try {
            $rawLine = trim(readline("> "));
            $description = preg_replace("/\s{2,}/", " ", $rawLine);

            if ($description == "exit") {
                return false;
            }
            $shape = $this->factory->createShape($description);
            $pictureDraft->addShape($shape);

            return true;
        } catch (Exception $exception) {
            echo $exception->getMessage() . "\n";
            $this->printHelp();

            return true;
        }
    }
}