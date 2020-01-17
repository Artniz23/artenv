<?php

namespace Artenv;

use Artenv\Store\StoreBuilder;
use Artenv\Loader\Loader;
use Artenv\Loader\LoaderInterface;
use Artenv\Store\FileStore;
use Artenv\Scanner\ScannerEnv;

class Artenv
{
    protected $store;
    protected $loader;

    public function __construct(LoaderInterface $loader, $store)
    {
        $this->store = new FileStore($store);
        $this->loader = $loader;
    }

    public static function createInstance($paths = null, $names = null)
    {

        if ($paths == null) {
            $dir = $_SERVER['DOCUMENT_ROOT'];
            $store = ScannerEnv::scanDir($dir)->scanEnv();
        } else {
            $store = StoreBuilder::create($paths, $names)->make();
        }

        return new self(new Loader(), $store);
    }

    public function load()
    {
        $this->loader->load($this->store->read());
    }

    public static function getEnv($name = null)
    {
        return $name === null ? getenv() : getenv($name);
    }
}