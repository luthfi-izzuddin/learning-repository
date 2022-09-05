<?php

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";

use Entity\Todolist;
use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;

function testShowTodolist(): void
{

    $todolistRepository = new TodolistRepositoryImpl();
    $todolistRepository->todolist[1] = new Todolist("Belajar PHP Dasar");
    $todolistRepository->todolist[2] = new Todolist("Belajar PHP OOP");
    $todolistRepository->todolist[3] = new Todolist("Belajar PHP Database");

    $todolistService = new TodolistServiceImpl($todolistRepository);

    $todolistService->showTodolist();
}

function testAddTodolist(): void
{

    $todolistRepository = new TodolistRepositoryImpl();
    $todolistRepository->todolist[1] = new Todolist("Belajar HTML");
    $todolistRepository->todolist[2] = new Todolist("Belajar CSS");
    $todolistRepository->todolist[3] = new Todolist("Belajar JavaScript");

    $todolistService = new TodolistServiceImpl($todolistRepository);

    $todolistService->addTodolist("Belajar PHP Dasar");
    $todolistService->showTodolist();
    $todolistService->addTodolist("Belajar PHP OOP");
    $todolistService->showTodolist();
    $todolistService->addTodolist("Belajar PHP Database");
    $todolistService->showTodolist();
}

function testRemoveTodolist(): void
{

    $todolistRepository = new TodolistRepositoryImpl();
    $todolistRepository->todolist[1] = new Todolist("Belajar HTML");
    $todolistRepository->todolist[2] = new Todolist("Belajar CSS");
    $todolistRepository->todolist[3] = new Todolist("Belajar JavaScript");

    $todolistService = new TodolistServiceImpl($todolistRepository);

    $todolistService->addTodolist("Belajar PHP Dasar");
    $todolistService->showTodolist();
    $todolistService->addTodolist("Belajar PHP OOP");
    $todolistService->showTodolist();
    $todolistService->addTodolist("Belajar PHP Database");
    $todolistService->showTodolist();

    $todolistService->removeTodolist(1);
    $todolistService->showTodolist();
    $todolistService->removeTodolist(4);
    $todolistService->showTodolist();
    $todolistService->removeTodolist(3);
    $todolistService->showTodolist();
    $todolistService->removeTodolist(7);
    $todolistService->showTodolist();
}

testRemoveTodolist();
