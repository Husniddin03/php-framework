<?php

namespace application\controller;

use vendor\controller\Controller;

class LogController extends Controller
{
    public function index()
    {
        return $this->view('log/index', ['direct' => $this->get('direct')]);
    }
    public function login()
    {
        return $this->view('log/login');
    }

    public function register(){
        return $this->view('log/register');
    }
}
