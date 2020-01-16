<?php


namespace Artenv\Store;

use Artenv\Store\File\Paths;

class StoreBuilder
{
    private $paths;

    private $names;

    public function __construct($paths, $names)
    {
        $this->paths = $paths;
        $this->names = $names;
    }

    public static function create($paths, $names)
    {
        return new self((array) $paths, $names);
    }

    public function make()
    {
        return Paths::filePaths($this->paths, $this->names === null ? ['.env'] : $this->names);
    }
}