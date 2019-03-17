<?php

class Color
{
    private const COLOR = [
        "green" => "#00ff00",
        "red" => "#ff0000",
        "blue" => "#0000ff",
        "yellow" => "#f0ff12",
        "pink" => "#ffc0cb",
        "black" => "#000000",
    ];

    public static function getColorByType(string $type = ""): string
    {
        return self::COLOR[$type] ?? null;
    }
}