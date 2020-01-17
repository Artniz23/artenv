<?php


namespace Artenv\Store\File;


class Paths
{
    /**
     * Returns the full paths to the files.
     *
     * @param string[] $paths
     * @param string[] $names
     *
     * @return string[]
     */

    public static function filePaths($paths, $names)
    {
        $files = [];

        foreach ($paths as $path) {
            foreach ($names as $name) {
                $files[] = rtrim($path, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$name;
            }
        }

        return $files;
    }
}