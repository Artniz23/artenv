<?php


namespace Artenv\Store;

use Artenv\Store\File\Paths;

class StoreBuilder
{
    /**
     * The paths to search within.
     *
     * @var string[]
     */

    private $paths;

    /**
     * The file names to search for.
     *
     * @var string[]|null
     */

    private $names;

    /**
     * Create a new store builder instance.
     *
     * @param string[]      $paths
     * @param string[]|null $names
     *
     * @return void
     */

    public function __construct($paths, $names)
    {
        $this->paths = $paths;
        $this->names = $names;
    }

    /**
     * Create a new store builder instance.
     *
     * @param string               $paths
     * @param string[]|null        $names
     *
     * @return \Artenv\Store\StoreBuilder
     */

    public static function create($paths, $names)
    {
        return new self((array) $paths, $names);
    }

    /**
     * Make the full path to the enviroment file.
     *
     * @return \Artenv\Store\File\Paths
     */

    public function make()
    {
        return Paths::filePaths($this->paths, $this->names === null ? ['.env'] : $this->names);
    }
}