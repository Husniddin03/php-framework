<?php

use vendor\global\Roud;


Roud::get('/', 'MainController/index');
Roud::get('main/index', 'MainController/index');
Roud::get('main/about', 'MainController/about');