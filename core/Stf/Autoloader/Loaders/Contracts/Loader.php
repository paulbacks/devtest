<?php

namespace Stf\Autoloader\Loaders\Contracts;

interface Loader
{
    public function autoload($class);
    public function register();
    public function setNamespace($namespace);
    public function setDirectory($directory);
}