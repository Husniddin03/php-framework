<?php

use application\controller\LogController;
use application\controller\MainController;
use application\controller\QuizController;
use vendor\global\Roud;


Roud::get('/', [MainController::class, 'index']);
Roud::get('main/about', [MainController::class, 'about']);
Roud::get('main/index', [MainController::class, 'index']);

Roud::get('quiz/index', [QuizController::class, 'index']);
Roud::get('quiz/upload', [QuizController::class, 'uploadFile']);

Roud::get('log/index', [LogController::class, 'index']);
Roud::post('log/login', [LogController::class, 'login']);
Roud::post('log/register', [LogController::class, 'register']);