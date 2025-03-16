<?php

namespace vendor\controller;

class Controller
{
    public function view($path, $data = [])
    {
        extract($data);
        require "application/view/$path.php";
    }

    public function redirect($path)
    {
        header("Location: $path");
    }
}