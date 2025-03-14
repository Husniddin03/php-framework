<?php

namespace vendor\global;

class Roud
{
    public static $data = [];
    public static function post($path, $url)
    {
        self::$data[$path] = $url;
    }
    public static function get($path, $url)
    {
        self::$data[$path] = $url;
    }
    public static function run($url){
        include __DIR__ ."/../../roud/Roud.php";
        if($url == '/'){
            if(array_key_exists($url, self::$data)){
                return explode('/', self::$data[$url]);
            } else {
                echo "Error 404"; die();
            }
        }
        $path = substr($url, 1);
        if(array_key_exists($path, self::$data)){
            return explode('/', self::$data[$path]);
        } else {
            echo "Error 404"; die();
        }
    }
}
