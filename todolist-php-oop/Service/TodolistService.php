<?php

/**
 * Service diberikan oleh user kemudian memanggil repository untuk memanipulasi data sesuai input yang diberikan
 **/

namespace Service {

    use Entity\Todolist;
    use Repository\TodolistRepository;

    interface TodolistService
    {

        function showTodolist(): void;

        function addTodolist(string $todo): void;

        function removeTodolist(int $number): void;
    }

    // implementasi interface di atas
    class TodolistServiceImpl implements TodolistService
    {

        // menambahkan atribut/properties TodolistRepository agar bisa mengakses fungsi yang ada pada layer repository
        // service =(mengakses)=> repository
        private TodolistRepository $todolistRepository;

        public function __construct(TodolistRepository $todolistRepository)
        {
            $this->todolistRepository = $todolistRepository;
        }

        function showTodolist(): void
        {
            echo "TODOLIST" . PHP_EOL;
            $todolist = $this->todolistRepository->getAll();
            foreach ($todolist as $number => $value) {
                echo "$number. " . $value->getTodo() . PHP_EOL;
                // $number diambil dari indeks/key array, value diambil dari entity class Todolist, menggunakan getTodo() karena properites $todo bersifat private 
            }
        }

        function addTodolist(string $todo): void
        {
            $todolist = new Todolist($todo); // membuat object Todolist baru berdasar inputan dari argumen fungsi addTodolist()
            $this->todolistRepository->add($todolist); // menyimpan object menggunakan fungsi add() yang ada pada repository
            echo "Sukses menambahkan Todolist" . PHP_EOL;
        }

        function removeTodolist(int $number): void
        {

            if ($this->todolistRepository->remove($number)) {
                echo "Sukses menghapus Todolist" . PHP_EOL;
            } else {
                echo "Gagal menghapus Todolist" . PHP_EOL;
            }
        }
    }
}
