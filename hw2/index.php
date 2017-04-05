<?php

require_once __DIR__ . '/protected/autoload.php';

$data = App\Models\Article::findLastEntries();

if(empty($data) || $data === false) {
//    $error = 'no records';
} else {
    include __DIR__ . '/article/index.html';
}