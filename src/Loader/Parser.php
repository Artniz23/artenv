<?php


namespace Artenv\Loader;


class Parser
{
    /**
     * Parse the given environment variable entry into a name and value.
     *
     * @param string $entry
     *
     * @return array{string,string|null}
     */

    public static function parse($entry)
    {
        list($name, $value) = self::splitStringIntoParts($entry);

        return [self::parseVar($name), self::parseVar($value)];
    }

    /**
     * Split the compound string into parts.
     *
     * @param string $line
     *
     * @return array{string,string|null}
     */

    private static function splitStringIntoParts($line)
    {
        $name = $line;
        $value = null;

        if (strpos($line, '=') !== false) {
            list($name, $value) = array_map('trim', explode('=', $line, 2));
        }

        return [$name, $value];
    }

    /**
     * Strips quotes and the optional leading "export " from the variable name.
     *
     * @param string $var
     *
     * @return string
     */

    private static function parseVar($var)
    {
        $var = trim(str_replace(['export ', '\'', '"'], '', $var));

        return $var;
    }
}