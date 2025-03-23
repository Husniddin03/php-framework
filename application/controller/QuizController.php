<?php

namespace application\controller;

use vendor\controller\Controller;
use vendor\session\Session;

Session::start();

class QuizController extends Controller
{
    public function index()
    {
        return $this->view('quiz/index');
    }
    public function uploadFile(){
        return $this->view('quiz/upload');
    }
}
