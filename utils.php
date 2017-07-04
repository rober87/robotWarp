<?php


function filterString($string) {

    if (!empty($string)) {
        readline_add_history($string);
    }
    try {
        $array = str_split($string);
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }
    return $array;
}