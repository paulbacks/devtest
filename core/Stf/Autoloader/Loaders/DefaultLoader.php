<?php

namespace Stf\Autoloader\Loaders;

use Stf\Autoloader\Loaders\Contracts\Loader;

class DefaultLoader implements Loader
{
    protected $namespace;
    protected $directory;

    /**
     * Resolve class to be auto loaded
     *
     * @param $class
     * @return bool
     */
    public function autoload($class)
    {
        if($this->_responsible($class))
        {
            $dir = dirname($this->directory);
            $path =  $dir . "/" . str_replace("\\", '/', $class) . ".php";

            if(file_exists($path))
            {
                require_once $path;
                return true;
            }
        }

        return false;
    }

    /**
     * Register itself for auto loading
     */
    public function register()
    {
        spl_autoload_register([$this,'autoload']);
    }

    /**
     * Set entry namespace
     *
     * @param $namespace
     */
    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
    }

    /**
     * Set entry directory
     *
     * @param $directory
     */
    public function setDirectory($directory)
    {
        $this->directory = $directory;
    }

    /**
     * Return whether or not this class can handle the autoload
     *
     * @param $class
     * @return bool
     */
    private function _responsible($class)
    {
        return strpos($class, $this->namespace) === 0;
    }
}