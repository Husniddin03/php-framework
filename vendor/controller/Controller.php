<?php

namespace vendor\controller;

class Controller
{
    public function view($path, $data = [])
    {
        extract($data);
        include "application/view/$path.php";
    }
}