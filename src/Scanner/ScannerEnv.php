<?php


namespace Artenv\Scanner;

use Artenv\Loader\Arrays;

class ScannerEnv
{
    private $files;

    public function __construct(array $results)
    {
        $this->files = $results;
    }

    public static function scanDir($dir, &$results = array())
    {
        $files = scandir($dir);
        foreach($files as $key => $value){
            $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
            if(!is_dir($path)) {
                $results[] = $path;
            } else if($value != "." && $value != "..") {
                self::scanDir($path, $results);
                $results[] = $path;
            }
        }

        return new self($results);
    }

    public function scanEnv()
    {
        return Arrays::filter($this->files);
    }
}