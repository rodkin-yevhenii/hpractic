<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitaff1481a7aff0d1e114ea67ebe1086fb
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitaff1481a7aff0d1e114ea67ebe1086fb', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitaff1481a7aff0d1e114ea67ebe1086fb', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitaff1481a7aff0d1e114ea67ebe1086fb::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
