<?php

namespace application\controller;

use vendor\controller\Controller;

class LogController extends Controller
{
    public function index()
    {
        return $this->view('log/index');
    }
    public function about()
    {
        return $this->view('log/about');
    }
}
