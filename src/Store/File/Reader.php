<?php


namespace Artenv\Store\File;


class Reader
{
    /**
     * Read the file(s), and return their raw content.
     *
     * @param string[] $filePaths
     *
     * @return array<string,string>
     */

    public static function read(array $filePaths){
        $output = [];

        foreach ($filePaths as $filePath) {
            $output[] = file_get_contents($filePath);
        }

        return $output;
    }
}