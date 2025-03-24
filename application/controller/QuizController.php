<?php

namespace application\controller;

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
            $uploadDir = __DIR__ . '/../assets/uploads';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];

            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

            $extensions = ['txt', 'pdf'];

            $fileSize = $_FILES['file']['size'];

            if ($fileSize > 1024 * 1024 || !in_array($fileExtension, $extensions)) {
                return $this->redirect('quiz/upload');
            }

            $newFileName = uniqid(time(), true) . $fileExtension;

            $uploadFile = $uploadDir . '/' . $newFileName;

            if (!move_uploaded_file($fileTmpName, $uploadFile)) {
                return $this->redirect('quiz/upload');
            } else {
                echo 'Uploaded file ' . $uploadFile;
            }
        }
        die();
    }
}
