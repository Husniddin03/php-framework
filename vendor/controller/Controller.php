<?php

namespace vendor\controller;

use vendor\session\Session;

Session::start();
class Controller
{
    use \vendor\HTTP\HTTPController;

    public function view($path, $data = [])
    {
        extract($data);
        require "application/view/$path.php";
    }

    public function redirect($path, $data = [])
    {
        header("Location: $path");
        exit();
    }

    public function back()
    {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
}
