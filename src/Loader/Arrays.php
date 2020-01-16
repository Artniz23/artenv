<?php


namespace Artenv\Loader;


class Arrays
{
    public static function split($content)
    {
        return preg_split("/(\r\n|\n|\r)/", $content);
    }
}