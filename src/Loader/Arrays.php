<?php


namespace Artenv\Loader;


class Arrays
{
    /**
     * Perform a preg split.
     *
     * @param string $content
     *
     * @return <string[]>
     */

    public static function split($content)
    {
        return preg_split("/(\r\n|\n|\r)/", $content);
    }

    /**
     * Perform an array_filter to select only env files.
     *
     * @param string[] $files
     *
     * @return <string[]>
     */

    public static function filter($files)
    {
        return array_filter($files, function ($file){
            return strpos($file, '.env');
        });
    }
}