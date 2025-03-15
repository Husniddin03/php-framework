<?php

namespace vendor\HTTP;

class Get
{
    public static $data = [];
    public static function elements(){
        return self::$data;
    }
    public static function element($name){
        return self::$data[$name];
    }
}