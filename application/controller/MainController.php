<?php

namespace application\controller;

use vendor\controller\Controller;
use vendor\session\Session;

Session::start();

class MainController extends Controller
{
    public function header()
    {
        return $this->view('common/header');
    }
    public function footer()
    {
        return $this->view('common/footer');
    }
    public function index()
    {
        return $this->view('main/index');
    }
}
