<?php

namespace application\controller;

use application\model\User;
use vendor\controller\Controller;

class MainController extends Controller
{
    public function index()
    {
        print_r(User::select('name')->where('id=14')->get());
        die();
        return $this->view('main/index');
    }
}
