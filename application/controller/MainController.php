<?php

namespace application\controller;

use vendor\controller\Controller;

class MainController extends Controller
{
    public function index()
    {
        return $this->view('main/index');
    }
}