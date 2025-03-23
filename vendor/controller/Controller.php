<?php

namespace vendor\controller;

use application\model\User;
use Dom\ChildNode;
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

    public function redirect($path)
    {
        header("Location: $path");
        exit();
    }
}
