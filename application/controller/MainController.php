<?php

namespace application\controller;

use application\model\User;
use vendor\controller\Controller;
use vendor\session\Session;

Session::start();

class MainController extends Controller
{
    public function header()
    {
        if (!User::auth()) {
            return $this->redirect('/log/index');
        }
        return $this->view('common/header');
    }
    public function footer()
    {
        if (!User::auth()) {
            return $this->redirect('/log/index');
        }
        return $this->view('common/footer');
    }
    public function index()
    {
        if (!User::auth()) {
            return $this->redirect('/log/index');
        }
        return $this->view('main/index');
    }
}
