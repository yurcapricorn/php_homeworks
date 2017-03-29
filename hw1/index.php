<?php

require_once __DIR__ . '/autoload.php';

$data = Models\Article::findLastEntries(3);

include __DIR__ . '/templates/index.html';
