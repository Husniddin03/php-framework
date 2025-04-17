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
        $quizzes = Topic::findName('userId', User::auth()->id);
        return $this->view('quiz/index', ['quizzes' => $quizzes]);
    }

    public function all()
    {
        if (!User::auth()) {
            return $this->redirect('/log/index');
        }
        $data = Topic::getAll();
        $quizzes = [];

        foreach ($data as $item) {
            $quizzes[$item->userId][] = $item;
        }
        return $this->view('quiz/all', ['quizzes' => $quizzes]);
    }

    public function test()
    {
        if (!User::auth()) {
            return $this->redirect('/log/index');
        }
        $topic = Topic::select('*')->where('id = ' . $this->get('id'))->get();
        $question = Question::select('*')->where('topicId = ' . $topic->id)->all();
        return $this->view('quiz/test', ['data' => $question]);
    }

    public function form()
    {
        if (!User::auth()) {
            return $this->redirect('/log/index');
        }
        $id = $this->get('id');
        $topicName = Topic::select('*')->where('id = ' . $id)->get();
        if (!$topicName) {
            return $this->back();
        }
        $count = Question::countId('topicId', $id);
        if ($count == 0) {
            return $this->back();
        }
        return $this->view('quiz/form', ['count' => $count, 'topicName' => $topicName]);
    }

    public function quiz()
    {
        if (!User::auth()) {
            return $this->redirect('/log/index');
        }

        $topic = Topic::select('*')->where('id = ' . $this->post('topicId'))->get();

        if (!$topic) {
            return $this->back();
        }

        if ($this->post('order') == 'shuffle') {
            $question = Question::select('*')->where('topicId = ' . $topic->id)->all();
            shuffle($question);
            $question = array_slice($question, $this->post('start') - 1, $this->post('number'));
        } else {
            $question = Question::select('*')->where('topicId = ' . $topic->id)->limit($this->post('start'), $this->post('number'))->all();
        }
        if (!$question) {
            return $this->back();
        }

        if ($this->post('type') == 'immediately') {
            return $this->view('quiz/single', ['topic' => $topic, 'question' => $question, 'time' => $this->post('time'), 'type' => $this->post('type')]);
        } else {
            return $this->view('quiz/exam', ['topic' => $topic, 'question' => $question, 'time' => $this->post('time'), 'type' => $this->post('type')]);
        }
    }

    public function single()
    {
        if (!User::auth()) {
            return $this->redirect('/log/index');
        }
        return $this->view('quiz/single');
    }

    public function check()
    {
        if (!User::auth()) {
            return $this->redirect('/log/index');
        }
        $result = [];
        $topic = null;
        $questions = unserialize(base64_decode($this->post('answers')));
        foreach ($questions as $value) {
            $trash = [];
            $trash['question'] = $value->question;
            if ($topic == null) {
                $topic = Topic::select('*')->where('id = ' . $value->topicId)->get()->theme;
            }
            $trash['answer'] = $value->answer;

            if ($this->post($value->id) !== null) {
                $userAnswer = $this->post($value->id);
                if ($userAnswer == $value->answer) {
                    $trash['useranswer'] = $userAnswer;
                } else {
                    $trash['useranswer'] = $userAnswer;
                }
            } else {
                $trash['useranswer'] = "Tanlanmagan!";
            }
            $result[] = $trash;
        }

        return $this->view('/quiz/answer', ['result' => $result, 'topic' => $topic]);
    }

    public function answer()
    {
        return $this->view('/quiz/answer');
    }

    public function exam()
    {
        if (!User::auth()) {
            return $this->redirect('/log/index');
        }
    }

    public function answerCheck()
    {
        if (!User::auth()) {
            return $this->redirect('/log/index');
        }

        $data = json_decode(file_get_contents("php://input"), true);

        // Foydalanuvchi ma'lumotlarini qaytarish
        if ($data) {
            echo json_encode([
                "status" => "success",
                "message" => "Ma'lumot muvaffaqiyatli qabul qilindi!",
                "received_data" => $data
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Ma'lumot qabul qilinmadi!"
            ]);
        }
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
                $questions = explode($this->post('question'), $fileContent);
                $questions = array_map('trim', $questions);
                foreach ($questions as $question) {
                    $option = explode($this->post('option'), $question);
                    $option = array_map('trim', $option);
                    $data = [];
                    $data['topicId'] = $topic;
                    foreach ($option as $key => $value) {
                        $text = trim($value);
                        if ($key === 0) {
                            $data['question'] = $text;
                        } elseif ($text[0] == $this->post('correct')) {
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
        return $this->redirect('/quiz/index');
    }
}
