<?php

namespace Helper {

    class InputHelper
    {
        static function input(string $info): string // fungsi agar user dapat menginputkan data
        {
            echo "$info : ";
            $result = fgets(STDIN);
            return trim($result);
        }
    }
}
