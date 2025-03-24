<?php

namespace application\controller;

use application\model\Question;
use application\model\Topic;
use application\model\User;
use vendor\controller\Controller;
use vendor\session\Session;

Session::start();

class QuizController extends Controller
{
    public function index()
    {
        if (!User::auth()) {
            return $this->redirect('/log/index');
        }
        return $this->view('quiz/index');
    }
    public function uploadFile()
    {
        if (!User::auth()) {
            return $this->redirect('/log/index');
        }
        return $this->view('quiz/upload');
    }
    public function upload()
    {
        if (!User::auth()) {
            return $this->redirect('/log/index');
        }
        if ($this->post()) {

            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];

            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

            $extensions = ['txt'];

            $fileSize = $_FILES['file']['size'];

            if ($fileSize > 1024 * 1024 || !in_array($fileExtension, $extensions)) {
                return $this->redirect('quiz/upload');
            } else {
                $topic = Topic::create([
                    'userId' => User::auth()->id,
                    'theme' => $this->post('topic'),
                ]);
                $fileContent = file_get_contents($fileTmpName);
                $questions = explode("++++", $fileContent);
                $questions = array_map('trim', $questions);
                foreach ($questions as $question) {
                    $option = explode("====", $question);
                    $option = array_map('trim', $option);
                    $data = [];
                    $data['topicId'] = $topic;
                    foreach ($option as $key => $value) {
                        $text = trim($value);
                        if ($key === 0) {
                            $data['question'] = $text;
                        } elseif ($text[0] == "#") {
                            $text = substr($text, 1);
                            $data['option' . (string)$key] = $text;
                            $data['answer'] = $text;
                        } else {
                            $data['option' . (string)$key] = $text;
                        }
                    }
                    Question::create($data);    
                }
            }
        }
        return $this->view('/quiz/index', ['data' => Question::getAll()]);
    }
}
