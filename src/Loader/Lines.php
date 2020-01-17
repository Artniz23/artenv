<?php


namespace Artenv\Loader;


class Lines
{
    /**
     * Process the array of lines of environment variables.
     *
     * @param string[] $lines
     *
     * @return string[]
     */

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

    /**
     * Determine if the line in the file is a comment, e.g. begins with a #.
     *
     * @param string $line
     *
     * @return bool
     */

    private static function isComment($line)
    {
        $line = ltrim($line);
        return isset($line[0]) && $line[0] === '#';
    }

    /**
     * Determine if the given line looks like it's setting a variable.
     *
     * @param string $line
     *
     * @return bool
     */

    private static function isSetter($line)
    {
        return strpos($line, '=') !== false;
    }
}