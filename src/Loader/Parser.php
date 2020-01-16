<?php


namespace Artenv\Loader;


class Parser
{
    public static function parse($entry)
    {
        list($name, $value) = self::splitStringIntoParts($entry);

        return [self::parseVar($name), self::parseVar($value)];
    }

    private static function splitStringIntoParts($line)
    {
        $name = $line;
        $value = null;

        if (strpos($line, '=') !== false) {
            list($name, $value) = array_map('trim', explode('=', $line, 2));
        }

        return [$name, $value];
    }

    private static function parseVar($var)
    {
        $var = trim(str_replace(['export ', '\'', '"'], '', $var));

        return $var;
    }
}