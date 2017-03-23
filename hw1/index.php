<?php

include __DIR__ . '/autoload.php';

$data = Models\Article::findLastEntries(3);

include 'templates\news_index.html';
