<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite946841fcdd06c7e5c7695a6730c669a
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Libsxpsmart\\' => 12,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Libsxpsmart\\' => 
        array (
            0 => __DIR__ . '/../..' . '/libs-terceros',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite946841fcdd06c7e5c7695a6730c669a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite946841fcdd06c7e5c7695a6730c669a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
