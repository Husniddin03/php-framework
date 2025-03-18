<?php

namespace application\controller;

use application\model\User;
use vendor\controller\Controller;

class MainController extends Controller
{
    public function index()
    {
        return $this->view('main/index');
    }
}