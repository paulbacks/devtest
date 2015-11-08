<?php 

namespace Stf;
use Stf\Autoloader;

class Application
{
    public function __construct()
    {
        $loader = Autoloader\Register::getDefaultLoader();
        $loader->setDirectory(__DIR__);
        $loader->setNamespace(__NAMESPACE__);

        if(!Autoloader\Register::hasNamespace(__NAMESPACE__))
        {
            Autoloader\Register::register([
                __NAMESPACE__ => $loader
            ]);
        }
    }
}