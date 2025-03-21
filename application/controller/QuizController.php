<?php

namespace application\controller;

use vendor\controller\Controller;
use vendor\session\Session;

Session::start();

class QuizController extends Controller
{
    public function index()
    {
        print_r($_SESSION);
        die();

        $file = file_get_contents('application/assets/test.txt');
        $questions = explode("++++", $file);
        $questions = array_map('trim', $questions);
        $question = [];
        foreach ($questions as $value) {
            $test = explode("====", $value);
            $test = array_map('trim', $test);
            foreach ($test as $item) {
                if (isset($item[0])) {
                    if ($item[0] == "#") {
                        $test['correct'] = $item;
                    }
                }
            }
            $question[] = $test;
        }
        return $this->view('quiz/index', ['question' => $question]);
    }
    public function test()
    {
        Session::unset('test');
        die();
    }
}
