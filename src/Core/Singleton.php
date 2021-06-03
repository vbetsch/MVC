<?php


abstract class Singleton
{
    protected static $instances = [];

    public static function get_instance(): self
    {
        $class = get_called_class();

        if (!isset($instances[$class])) {
            self::$instances[$class] = new $class;
        }
        return self::$instances[$class];
    }
}