<?php

require_once __DIR__ . '/protected/autoload.php';

$data = App\Models\Article::findLastEntries();
include __DIR__ . '/article/index.html';