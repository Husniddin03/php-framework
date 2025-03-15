<?php

use application\controller\LogController;
use application\controller\MainController;
use vendor\global\Roud;

// ?item=type type = [number, string, array, object, boolean, null]

Roud::get('/', [MainController::class, 'index']);
Roud::get('main/about', [MainController::class, 'about']);
Roud::get('main/index', [MainController::class, 'index']);

Roud::get('log/index?id=number', [LogController::class, 'index']);