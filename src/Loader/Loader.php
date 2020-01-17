<?php

namespace Artenv\Loader;

use Artenv\Loader\LoaderInterface;
use Artenv\Loader\Lines;
use Artenv\Loader\Arrays;
use Artenv\Loader\Parser;

class Loader implements LoaderInterface
{
    public function load($content)
    {
        $this->processEntries(Lines::process(Arrays::split($content)));
    }

    public function processEntries(array $entries)
    {
        foreach ($entries as $entry) {
            list($name, $value) = Parser::parse($entry);
            $this->setEnv($name, $value);
        }
    }

    private function setEnv($name, $value)
    {
        putenv("$name=$value");
    }
}