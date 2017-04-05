<?php

require_once __DIR__ . '/autoload.php';

$data = Models\Article::findLastEntries();

if(empty($data) || $data === false) {
//    $error = 'no records';
} else {
    include __DIR__ . '/templates/index.html';
}


