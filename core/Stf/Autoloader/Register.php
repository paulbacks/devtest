<?php

namespace Stf\Autoloader;
use Stf\Autoloader\Exceptions\AutoloadException;
use Stf\Autoloader\Loaders\Contracts\Loader;
use Stf\Autoloader\Loaders\DefaultLoader;

require_once __DIR__ . "/Loaders/Contracts/Loader.php";
require_once __DIR__ . "/Loaders/DefaultLoader.php";
require_once __DIR__ . "/Exceptions/AutoloadException.php";

class Register
{
    /**
     * Save registered loaders
     */
	protected static $loaders = [];

    /**
     * @var Loader
     */
    protected static $defaultLoader;

    /**
     * Check if namespace exists
     *
     * @param $namespace
     * @return bool
     */
    public static function hasNamespace($namespace)
    {
        return isset(self::$loaders[$namespace]);
    }

    /**
     * Set default loader
     *
     * @param Loader $loader
     * @return void
     */
    public static function setDefaultLoader(Loader $loader)
    {
        self::$defaultLoader = $loader;
    }

    /**
     * Get default loader
     *
     * @return Loader
     */
    public static function getDefaultLoader()
    {
        return self::$defaultLoader;
    }

    /**
     * Register auto loader
     *
     * @param array $options
     * @throws AutoloadException
     */
	public static function register(array $options)
	{
        foreach($options as $namespace=>$autoloader)
        {
            $type = class_implements($autoloader);

            //Invalid type given
            if(!in_array(Loader::class, $type))
            {
                throw new AutoloadException("Autoloader should implement " . Loader::class);
            }
            $autoloader->setNamespace($namespace);

            //Namespace already registered?
            if(isset(self::$loaders[$namespace]))
            {
                throw new AutoloadException("Namespace " . $namespace . " already registered");
            }

            self::$loaders[$namespace] = $autoloader;

            $autoloader->register();
        }
	}

    /**
     * Load default auto loader
     *
     * @return DefaultLoader
     */
    public static function loadDefault()
    {
        return new DefaultLoader;
    }
}
