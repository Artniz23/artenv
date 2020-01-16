<?php


namespace Artenv\Store\File;


class Reader
{
    public static function read(array $filePaths){
        $output = [];

        foreach ($filePaths as $filePath) {
            $output[] = file_get_contents($filePath);
        }

        return $output;
    }
}