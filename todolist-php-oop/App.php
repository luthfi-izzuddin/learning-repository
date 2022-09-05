<?php

require_once __DIR__ . "/Entity/Todolist.php";
require_once __DIR__ . "/Repository/TodolistRepository.php";
require_once __DIR__ . "/Service/TodolistService.php";
require_once __DIR__ . "/View/TodolistView.php";
require_once __DIR__ . "/Helper/InputHelper.php";

use Entity\Todolist;
use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;
use View\TodolistView;
use Helper\InputHelper;

echo "Aplikasi Todolist" . PHP_EOL;

// membuat object repository sehingga object repository $todolistRepository memiliki fungsi2 yang ada pada class TodolistRepositoryImpl
$todolistRepository = new TodolistRepositoryImpl();
// membuat object service $todolistService sehingga memiliki fungsi2 yang ada pada class TodolistServiceImpl
$todolistService = new TodolistServiceImpl($todolistRepository); // $todolistRepository menjadi argumen agar service dapat memanggil dan menggunakan fungsi yang ada pada repository
// membuat object view $todolistView sehingga memiliki fungsi2 yang ada pada class TodolistView
$todolistView = new TodolistView($todolistService); // $todolistService menjadi argumen agar view dapat memanggil dan menggunakan fungsi yang ada pada service

// view =(mengakses)=> service =(mengakses)=> repository

$todolistView->showTodolist();
