<?php
session_start();
class Autoloader {

    public static function loadClass($className) {

        $path = __DIR__.DIRECTORY_SEPARATOR.$className.'.php';

        if(file_exists($path)) {
            include_once $path;
        }

    }


    public static function register() {

        spl_autoload_register([
            'Autoloader',
            'loadClass'
        ]);

    }

}


Autoloader::register();