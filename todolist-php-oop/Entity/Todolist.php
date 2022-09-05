<?php

/**
 * Entity dibuat paling awal yang merupakan representasi data dari aplikasi
 * Pada kasus ini, entity/data hanya ada todolist yang berupa string
 **/

namespace Entity {

    class Todolist
    {

        private string $todo;

        public function __construct(string $todo = "")
        {
            $this->todo = $todo;
        }

        // fungsi untuk mengambil data dari object Todolist
        public function getTodo(): string
        {
            return $this->todo;
        }

        // fungsi untuk mengubah data dari object Todolist
        public function setTodo(string $todo): void
        {
            $this->todo = $todo;
        }
    }
}
