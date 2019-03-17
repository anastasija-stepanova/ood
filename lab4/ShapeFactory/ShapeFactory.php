<?php

class ShapeFactory implements ShapeFactoryInterface
{
    private const ELLIPSE = 'ELLIPSE';
    private const RECTANGLE = 'RECTANGLE';
    private const TRIANGLE = 'TRIANGLE';
    private const POLYGON = 'POLYGON';

    /**
     * @param string $description
     * @return Shape
     * @throws Exception
     */
    public function createShape(string $description): Shape
    {
        $explodedDescription = explode(' ', $description);

        switch (strtoupper($explodedDescription[0]))
        {
            case self::ELLIPSE:
                return $this->createEllipse($explodedDescription);
            case self::RECTANGLE:
                return $this->createRectangle($explodedDescription);
            case self::TRIANGLE:
                return $this->createTriangle($explodedDescription);
            case self::POLYGON:
                return $this->createRegularPolygon($explodedDescription);
            default:
                throw new Exception("No such shape");
        }
    }

    /**
     * @param array $explodedDescription
     * @return Shape
     * @throws Exception
     */
    private function createRectangle(array $explodedDescription): Shape
    {
        if (count($explodedDescription) != 6)
        {
            throw new Exception("Invalid number of arguments");
        }
        $leftTop = new Point(floatval($explodedDescription[1]), floatval($explodedDescription[2]));
        $rightBottom = new Point(floatval($explodedDescription[3]), floatval($explodedDescription[4]));
        $color = Color::getColorByType($explodedDescription[5]);
        return new Rectangle($leftTop, $rightBottom, $color);
    }

    /**
     * @param array $explodedDescription
     * @return Shape
     * @throws Exception
     */
    private function createTriangle(array $explodedDescription): Shape
    {
        if (count($explodedDescription) != 8)
        {
            throw new Exception("Invalid number of arguments");
        }
        $vertex1 = new Point(floatval($explodedDescription[1]), floatval($explodedDescription[2]));
        $vertex2 = new Point(floatval($explodedDescription[3]), floatval($explodedDescription[4]));
        $vertex3 = new Point(floatval($explodedDescription[5]), floatval($explodedDescription[6]));
        $color = Color::getColorByType($explodedDescription[5]);
        return new Triangle($vertex1, $vertex2, $vertex3, $color);
    }

    /**
     * @param array $explodedDescription
     * @return Shape
     * @throws Exception
     */
    private function createEllipse(array $explodedDescription): Shape
    {
        if (count($explodedDescription) != 6)
        {
            throw new Exception("Invalid number of arguments");
        }
        $center = new Point(floatval($explodedDescription[1]), floatval($explodedDescription[2]));
        $horizontalRadius = floatval($explodedDescription[3]);
        $verticalRadius = floatval($explodedDescription[4]);
        $color = Color::getColorByType($explodedDescription[5]);
        return new Ellipse($center, $horizontalRadius, $verticalRadius, $color);
    }

    /**
     * @param array $explodedDescription
     * @return Shape
     * @throws Exception
     */
    private function createRegularPolygon(array $explodedDescription): Shape
    {
        if (count($explodedDescription) != 6)
        {
            throw new Exception("Invalid number of arguments");
        }
        $center = new Point(floatval($explodedDescription[1]), floatval($explodedDescription[2]));
        $vertexCount = intval($explodedDescription[3]);
        $radius = floatval($explodedDescription[4]);
        $color = Color::getColorByType($explodedDescription[5]);
        return new RegularPolygon($center, $radius, $vertexCount, $color);
    }
}