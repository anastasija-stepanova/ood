<?php

class CanvasSvg
{
    /** @var string */
    private $fillColor;
    /** @var string */
    private $outlineColor;
    /** @var string */
    private $buffer = '';

    public function setFillColor(string $color): void
    {
        $this->fillColor = $color;
    }
    public function setOutlineColor(string $color): void
    {
        $this->outlineColor = $color;
    }

    public function drawLine(Point $from, Point $to): void
    {
        $this->buffer .= $this->getLine($from, $to);
    }

    public function drawEllipse(Point $center, float $horizontalRadius, float $verticalRadius): void
    {
        $this->buffer .= $this->getEllipse($center->getX(), $center->getY(), $horizontalRadius, $verticalRadius);
    }

    public function __destruct()
    {
        $fileName = uniqid("canvas_") . '.svg';
        file_put_contents('./resources/' . $fileName, $this->getHeader() . $this->buffer . $this->getFooter());
    }

    private function getHeader(): string
    {
        return "<?xml version=\"1.0\" encoding=\"utf-8\"?>
                <!DOCTYPE svg PUBLIC \"-//W3C//DTD SVG 1.1//EN\" \"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd\">
                <svg version=\"1.1\" id=\"Beamed_note\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\"
                      y=\"0px\" xml:space=\"preserve\">" . PHP_EOL;
    }

    private function getFooter(): string
    {
        return "</svg>";
    }

    private function getLine(Point $from, Point $to): string
    {
        return "<line 
                  x1=\"{$from->getX()}\"
                  x2=\"{$to->getX()}\"
                  y1=\"{$from->getY()}\"
                  y2=\"{$to->getY()}\"
                  stroke-width=\"1\" stroke=\"{$this->outlineColor}\" fill=\"{$this->fillColor}\" />" . PHP_EOL;
    }

    private function getEllipse(float $centerX, float $centerY, float $horizontalRadius, float $verticalRadius): string
    {
        return "<ellipse
                  cx=\"{$centerX}\"
                  cy=\"{$centerY}\"
                  rx=\"{$horizontalRadius}\"
                  ry=\"{$verticalRadius}\"
                  stroke-width=\"1\" 
                  stroke=\"{$this->outlineColor}\"
                  fill=\"{$this->fillColor}\"/>". PHP_EOL;
    }
}