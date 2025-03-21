<?php

namespace application\controller;

use vendor\controller\Controller;
use vendor\session\Session;

Session::start();

class MainController extends Controller
{
    public function index()
    {
        return $this->view('main/index');
    }
}
