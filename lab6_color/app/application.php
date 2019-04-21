<?php

namespace app
{
    require_once("../inc/inc.php");

    use graphics_lib\Canvas;
    use graphics_lib_pro\ModernGraphicsRenderer;
    use graphics_lib_pro\RGBAColor;
    use shape_drawing_lib\CanvasPainter;
    use shape_drawing_lib\Point;
    use shape_drawing_lib\Triangle;
    use shape_drawing_lib\Rectangle;

    function paintPicture(CanvasPainter $painter): void
    {
        $triangle = new Triangle(new Point(10, 15), new Point(100, 200), new Point(150, 250), new RGBAColor(250, 250, 250, 1));
        $rectangle = new Rectangle(new Point(30, 40), 18, 24, new RGBAColor(250, 250, 250, 1));

        echo "Triangle:\n";
        $painter->draw($triangle);
        echo "\n";
        echo "Rectangle:\n";
        $painter->draw($rectangle);
        echo "\n";

    }

    function paintPictureOnCanvas(): void
    {
        $simpleCanvas = new \graphics_lib_pro\Canvas();
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