<?php

use application\controller\LogController;
use application\controller\MainController;
use application\controller\QuizController;
use vendor\global\Roud;


Roud::get('/', [MainController::class, 'index']);
Roud::get('main/about', [MainController::class, 'about']);
Roud::get('main/index', [MainController::class, 'index']);
Roud::get('main/header', [MainController::class, 'header']);
Roud::get('main/footer', [MainController::class, 'footer']);

Roud::get('quiz/index', [QuizController::class, 'index']);
Roud::get('quiz/upload', [QuizController::class, 'uploadFile']);
Roud::post('quiz/upload', [QuizController::class, 'upload']);
Roud::post('quiz/answerCheck', [QuizController::class, 'answerCheck']);
Roud::post('quiz/test', [QuizController::class, 'test']);

Roud::get('log/index', [LogController::class, 'index']);
Roud::post('log/login', [LogController::class, 'login']);
Roud::post('log/logout', [LogController::class, 'logout']);
Roud::post('log/register', [LogController::class, 'register']);
