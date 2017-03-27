<?php

require_once __DIR__ . '/protected/autoload.php';

include __DIR__ . '/protected/templates/admin.html';

$data = Models\Article::findLastEntries(3);

include __DIR__ . '/protected/templates/news_index.html';