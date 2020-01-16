<?php


namespace Artenv\Store;

use Artenv\Store\File\Reader;

class FileStore
{
    protected $filePaths;

    public function __construct(array $filePaths)
    {
        $this->filePaths = $filePaths;
    }

    public function read()
    {
        $contents = Reader::read($this->filePaths);

        if ($contents) {
            return implode("\n", $contents);
        }
    }
}