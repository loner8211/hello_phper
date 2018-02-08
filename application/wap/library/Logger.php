<?php
namespace app\wap\library;

class Logger
{
    public static function getInstance()
    {
        if (self::$_instance === null)
        {
            $instance = new self;
            self::$_instance = $instance;
        }
        return self::$_instance ;
    }
}
