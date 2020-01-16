<?php

namespace Artenv;

use Artenv\Store\StoreBuilder;
use Artenv\Loader\Loader;
use Artenv\Loader\LoaderInterface;
use Artenv\Store\FileStore;

class Artenv
{
    protected $store;
    protected $loader;

    public function __construct(LoaderInterface $loader, $store)
    {
        $this->store = new FileStore($store);
        $this->loader = $loader;
    }

    public static function createInstance($paths, $names = null)
    {
        $store = StoreBuilder::create($paths, $names)->make();

        return new self(new Loader(), $store);
    }

    public function load()
    {
        return $this->loader->load($this->store->read());
    }

    public static function getEnv($name = null)
    {
        return $name === null ? getenv() : getenv($name);
    }
}