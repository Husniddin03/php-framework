<?php

namespace vendor\global;

use Exception;

class Application
{
    public function run()
    {
        try {
            $url = $this->validate($_SERVER['REQUEST_URI']);
            $parts = $this->isurl($url, $_SERVER['REQUEST_METHOD']);

            $class = $parts[0];
            if (!class_exists($class)) {
                throw new Exception("Class $class not found");
            }
            $method = $parts[1];
            if (!method_exists($class, $method)) {
                throw new Exception("Method $method not found");
            }
            $controller = new $class();
            return $controller->$method();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function validate($data)
    {
        return htmlspecialchars(trim($data));
    }

    public function isurl($url, $mrthod)
    {
        $path = trim($url);
        return Roud::run($path, $mrthod);
    }
}
