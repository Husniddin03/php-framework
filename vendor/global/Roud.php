<?php

namespace vendor\global;

use vendor\HTTP\Get;

class Roud
{
    public static $dataGET = [];
    public static $dataPOST = [];

    public static function post($path, $dataPOST)
    {
        $url = $dataPOST[0] . '/' . $dataPOST[1];
        self::$dataPOST[$path] = $url;
    }

    public static function get($path, $dataGET)
    {
        $url = $dataGET[0] . '/' . $dataGET[1];
        self::$dataGET[$path] = $url;
    }

    public static function run($url, $method)
    {
        include __DIR__ . "/../../roud/Roud.php";

        if ($url == '/') {
            if (array_key_exists($url, self::$dataGET)) {
                return explode('/', self::$dataGET[$url]);
            } else {
                echo "Error 404";
                die();
            }
        }

        $path = substr($url, 1);
        if ($method == 'GET') {
            if (array_key_exists($path, self::$dataGET)) {
                return explode('/', self::$dataGET[$path]);
            } else {
                echo "Error 404: GET method not found";
                die();
            }
        } else if ($method == 'POST') {
            if (array_key_exists($path, self::$dataPOST)) {
                return explode('/', self::$dataPOST[$path]);
            } else {
                echo "Error 404: POST method not found";
                die();
            }
        } else {
            echo "Error 404";
            die();
        }
    }
}
