<?php

/**
 * View/UI digunakan untuk merender input user
 **/

namespace View {

    use Service\TodolistService;
    use Helper\InputHelper;

    class TodolistView
    {
        // menambahkan atribut/properties TodolistService agar bisa mengakses fungsi yang ada pada layer service
        // view (mengakses)--> service
        private TodolistService $todolistService;

        public function __construct(TodolistService $todolistService)
        {
            $this->todolistService = $todolistService;
        }

        function showTodolist(): void
        {
            while (true) {
                $this->todolistService->showTodoList();

                echo "MENU" . PHP_EOL;
                echo "1. Tambah Todo" . PHP_EOL;
                echo "2. Hapus Todo" . PHP_EOL;
                echo "x. Keluar" . PHP_EOL;
                echo "--------------------" . PHP_EOL;

                $pilihan = InputHelper::input("Pilih");

                if ($pilihan == 1) {
                    $this->addTodolist();
                } else if ($pilihan == 2) {
                    $this->removeTodoList();
                } else if ($pilihan == "x") {
                    break;
                } else {
                    echo "Pilihan tidak dimengerti" . PHP_EOL;
                }
            }

            echo "--------------------" . PHP_EOL;
            echo "Sampai jumpa lagi." . PHP_EOL;
        }

        function addTodolist(): void
        {
            echo "--------------------" . PHP_EOL;
            echo "MENAMBAH TODO" . PHP_EOL;

            $todo = InputHelper::input("Todo (tekan x untuk batal)");

            if ($todo == "x") {
                echo "Batal menambah todo." . PHP_EOL;
            } else {
                $this->todolistService->addTodoList($todo);
            }
        }

        function removeTodolist(): void
        {
            echo "--------------------" . PHP_EOL;
            echo "MENGHAPUS TODO" . PHP_EOL;

            $pilihan = InputHelper::input("Nomor (tekan x untuk batal");

            if ($pilihan == "x") {
                echo "Batal menghapus todo" . PHP_EOL;
            } else {
                $this->todolistService->removeTodoList($pilihan);
            }
        }
    }
}
