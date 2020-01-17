<?php


namespace Artenv\Scanner;

use Artenv\Loader\Arrays;

class ScannerEnv
{
    /**
     * Scans all folders in the home directory recursively
     * and find all enviroment files.
     *
     * @param string      $loader
     * @param string[]    $store
     *
     * @return array <string>
     */

    public static function scanEnv($dir, &$results = array())
    {
        $files = scandir($dir);
        foreach($files as $key => $value){
            $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
            if(!is_dir($path)) {
                $results[] = $path;
            } else if($value != "." && $value != ".." && $value != "vendor") {
                self::scanEnv($path, $results);
                $results[] = $path;
            }
        }

        return Arrays::filter($results);
    }
}