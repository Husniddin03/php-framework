<?php

use application\controller\LogController;
use application\controller\MainController;
use application\controller\test\TestController;
use vendor\global\Roud;


Roud::get('/', [MainController::class, 'index']);
Roud::get('main/about', [MainController::class, 'about']);
Roud::get('main/index', [MainController::class, 'index']);

Roud::get('log/index', [LogController::class, 'index']);