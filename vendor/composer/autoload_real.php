<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitb3c1156cbc35be31433135dbfbbaff21
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

        spl_autoload_register(array('ComposerAutoloaderInitb3c1156cbc35be31433135dbfbbaff21', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitb3c1156cbc35be31433135dbfbbaff21', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitb3c1156cbc35be31433135dbfbbaff21::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}