<?php

namespace application\controller;

use application\model\User;
use vendor\controller\Controller;
use vendor\HTTP\Get;

class LogController extends Controller
{
    public function index()
    {
        echo "<pre>";
        print_r(User::findOne(15)); die();
        return $this->view('log/index');
    }
    public function about()
    {
        return $this->view('log/about');
    }
}
