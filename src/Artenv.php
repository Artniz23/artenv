<?php

namespace Artenv;

use Artenv\Store\StoreBuilder;
use Artenv\Loader\Loader;
use Artenv\Loader\LoaderInterface;
use Artenv\Store\FileStore;
use Artenv\Scanner\ScannerEnv;

class Artenv
{
    /**
     * The store instance.
     *
     * @var \Artenv\Store\FileStore
     */

    protected $store;

    /**
     * The loader instance.
     *
     * @var \Artenv\Loader\LoaderInterface;
     */

    protected $loader;

    /**
     * Create a new artenv instance.
     *
     * @param \Artenv\Loader\LoaderInterface         $loader
     * @param \Artenv\Store\FileStore|string[]       $store
     *
     * @return void
     */

    public function __construct(LoaderInterface $loader, $store)
    {
        $this->store = new FileStore($store);
        $this->loader = $loader;
    }

    /**
     * Create a new artenv instance with default paths and names.
     *
     * @param string|null          $paths
     * @param string[]|null        $names
     *
     * @return \Artenv\Artenv
     */

    public static function createInstance($paths = null, $names = null)
    {

        if ($paths == null) {
            $dir = $_SERVER['DOCUMENT_ROOT'];
            $store = ScannerEnv::scanEnv($dir);
        } else {
            $store = StoreBuilder::create($paths, $names)->make();
        }

        return new self(new Loader(), $store);
    }

    /**
     * Read and load environment file(s).
     *
     * @return array<string,string|null>
     */

    public function load()
    {
        return $this->loader->load($this->store->read());
    }

    /**
     * Get environment variables.
     *
     * @return array<string,string|null>
     */

    public static function getEnv($name = null)
    {
        return $name === null ? getenv() : getenv($name);
    }
}