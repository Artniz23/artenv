<?php


namespace Artenv\Loader;


class Lines
{
    public static function process(array $lines)
    {
        $output = [];

        foreach ($lines as $line) {
            if (!self::isComment($line) && self::isSetter($line)) {
                $output[] = $line;
            }
        }

        return $output;
    }

    private static function isComment($line)
    {
        $line = ltrim($line);
        return isset($line[0]) && $line[0] === '#';
    }

    private static function isSetter($line)
    {
        return strpos($line, '=') !== false;
    }
}