<?php


namespace Artenv\Store;

use Artenv\Store\File\Reader;

class FileStore
{
    /**
     * The enviroment file paths.
     *
     * @var string[]
     */

    protected $filePaths;

    /**
     * Create a new file store instance.
     *
     * @param string[] $filePaths
     *
     * @return void
     */

    public function __construct(array $filePaths)
    {
        $this->filePaths = $filePaths;
    }

    /**
     * Read the content of the environment file(s).
     *
     * @return string
     */

    public function read()
    {
        $contents = Reader::read($this->filePaths);

        if ($contents) {
            return implode("\n", $contents);
        }
    }
}