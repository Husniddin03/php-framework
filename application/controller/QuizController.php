<?php

namespace application\controller;

use vendor\controller\Controller;

class QuizController extends Controller
{
    public function index()
    {
        return $this->view('quiz/index');
    }
}
