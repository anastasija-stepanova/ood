<?php

namespace app
{
    require_once("../inc/inc.php");

    use graphics_lib\Canvas;
    use modern_graphics_lib\ModernGraphicsRenderer;
    use modern_graphics_lib\ModernGraphicsRendererAdapter;
    use shape_drawing_lib\CanvasPainter;
    use shape_drawing_lib\Point;
    use shape_drawing_lib\Triangle;
    use shape_drawing_lib\Rectangle;

    function paintPicture(CanvasPainter $painter): void
    {
        $triangle = new Triangle(new Point(10, 15), new Point(100, 200), new Point(150, 250));
        $rectangle = new Rectangle(new Point(30, 40), 18, 24);

        echo "Triangle:\n";
        $painter->draw($triangle);
        echo "\n";
        echo "Rectangle:\n";
        $painter->draw($rectangle);
        echo "\n";

    }

    function paintPictureOnCanvas(): void
    {
        $simpleCanvas = new Canvas();
        $painter = new CanvasPainter($simpleCanvas);
        paintPicture($painter);
    }

    function paintPictureOnModernGraphicsRenderer()
    {
        $renderer = new ModernGraphicsRenderer();
        $adapter = new ModernGraphicsRendererAdapter($renderer);
        $painter = new CanvasPainter($adapter);
        paintPicture($painter);
    }

    function main(): void
    {
        echo "Should we use new API (y)?";

        try {
            $userInput = trim(readline(""));
            if (($userInput == "y" || $userInput == "Y")) {
                paintPictureOnModernGraphicsRenderer();
            } else {
                paintPictureOnCanvas();
            }
        } catch (\Exception $exception) {
            echo $exception->getMessage() . "\n";
        }
    }

    \app\main();
}