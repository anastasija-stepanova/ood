<?php

class GroupFillStyle implements StyleInterface
{
    /** @var StyleEnumeratorInterface */
    private $enumerator;

    public function __construct(StyleEnumeratorInterface $enumerator)
    {
        $this->enumerator = $enumerator;
    }

    public function isEnabled(): bool
    {
        $enable = null;
        $this->enumerator->execute(function (StyleInterface $style) use (&$enable)
        {
            $enable = $style->isEnabled();
        });

        return $enable;
    }

    public function enabled(bool $enabled): void
    {
        $this->enumerator->execute(function (StyleInterface $style) use ($enabled)
        {
            $style->enabled($enabled);
        });
    }

    public function getColor(): RGBAColor
    {
        $color = null;
        $this->enumerator->execute(function (StyleInterface $style) use (&$color)
        {
            $color = $style->getColor();
        });

        return $color;
    }

    public function setColor(RGBAColor $color): void
    {
        $this->enumerator->execute(function (StyleInterface $style) use ($color)
        {
            $style->setColor($color);
        });
    }
}