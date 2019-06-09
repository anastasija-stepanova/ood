<?php

class GroupOutlineStyle implements OutlineStyleInterface
{
    const DEFAULT_THICKNESS = 1;
    /** @var StyleEnumeratorInterface */
    private $enumerator;

    public function __construct(StyleEnumeratorInterface $enumerator)
    {
        $this->enumerator = $enumerator;
    }

    public function getOutlineThickness(): float
    {
        $outlineThickness = null;
        $this->enumerator->execute(function (OutlineStyleInterface $style) use (&$outlineThickness)
        {
            if (!isset($outlineThickness)) {
                $outlineThickness = $style->getOutlineThickness();
            }
        });

        return $outlineThickness ?? self::DEFAULT_THICKNESS;
    }

    public function setOutlineThickness(float $thickness): void
    {
        $this->enumerator->execute(function (OutlineStyleInterface $style) use ($thickness)
        {
            $style->setOutlineThickness($thickness);
        });
    }

    public function isEnabled(): bool
    {
        $enable = true;
        $this->enumerator->execute(function (OutlineStyleInterface $style) use (&$enable)
        {
            if (!isset($enable)) {
                $enable = $style->isEnabled();
            }
        });

        return $enable;
    }

    public function enabled(bool $enable): void
    {
        $this->enumerator->execute(function (OutlineStyleInterface $style) use ($enable)
        {
            $style->enabled($enable);
        });
    }

    public function getColor(): RGBAColor
    {
        $color = null;
        $this->enumerator->execute(function (OutlineStyleInterface $style) use (&$color)
        {
            if (!isset($color)) {
                $color = $style->getColor();
            }
        });

        return $color;
    }

    public function setColor(RGBAColor $color): void
    {
        $this->enumerator->execute(function (OutlineStyleInterface $style) use ($color)
        {
            $style->setColor($color);
        });
    }
}