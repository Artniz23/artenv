<?php

namespace Artenv\Loader;

use Artenv\Loader\LoaderInterface;
use Artenv\Loader\Lines;
use Artenv\Loader\Arrays;
use Artenv\Loader\Parser;

class Loader implements LoaderInterface
{
    /**
     * Load the given environment file content into the processing.
     *
     * @param string    $content
     *
     * @return array<string,string|null>
     */

    public function load($content)
    {
        return $this->processEntries(Lines::process(Arrays::split($content)));
    }

    /**
     * Process the environment variable entries.
     *
     * @param string[]         $entries
     *
     * @return array<string,string|null>
     */

    public function processEntries(array $entries)
    {
        $vars = [];

        if (!empty($entries)) {
            foreach ($entries as $entry) {
                list($name, $value) = Parser::parse($entry);
                $vars[$name] = $value;
                $this->setEnv($name, $value);
            }

            return $vars;
        }
    }

    /**
     * Setting environment variable.
     *
     * @param string         $name
     * @param string         $value
     *
     */

    private function setEnv($name, $value)
    {
        putenv("$name=$value");
    }
}