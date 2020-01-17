<?php


namespace Artenv\Loader;


class Arrays
{
    public static function split($content)
    {
        return preg_split("/(\r\n|\n|\r)/", $content);
    }

    public static function filter($files)
    {
        return array_filter($files, function ($file){
            return strpos($file, '.env');
        });
    }
}