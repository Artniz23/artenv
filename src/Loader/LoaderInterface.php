<?php


namespace Artenv\Loader;


interface LoaderInterface
{
    /**
     * Load the given environment file content into the processing.
     *
     * @param string       $content
     *
     * @return array<string,string|null>
     */

    public function load($content);
}