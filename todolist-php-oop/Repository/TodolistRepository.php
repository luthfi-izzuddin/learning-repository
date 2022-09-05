<?php

/**
 * Repository berisi business logic yang memanipulasi atau mengelola data/entity
 **/

namespace Repository {

    use Entity\Todolist;

    interface TodolistRepository
    {
        // repository =(mengakses)=> entity
        function add(Todolist $todolist): void; // $todolist akan memiliki properties sama seperti yang ada di entity class Todolist

        function remove(int $number): bool;

        function getAll(): array;
    }

    // implementasi interface di atas
    class TodolistRepositoryImpl implements TodolistRepository
    {

        // karena tidak ada database, maka membuat $todolist berupa array yang bernilai kosong untuk menyimpan data todo
        public array $todolist = array();

        function add(Todolist $todolist): void // objectnya dimasukkan ke dalam entity
        {
            $number = sizeof($this->todolist) + 1;

            $this->todolist[$number] = $todolist;
        }

        function remove(int $number): bool
        {
            if ($number > sizeof($this->todolist)) {
                return false;
            }

            for ($i = $number; $i < sizeof($this->todolist); $i++) {
                $this->todolist[$i] = $this->todolist[$i + 1];
            }

            unset($this->todolist[sizeof($this->todolist)]);

            return true;
        }

        function getAll(): array
        {
            return $this->todolist; // mengembalikan semua nilai yang ada pada array $todolist atau mengambil data yang ada pada array $todolist
        }
    }
}
