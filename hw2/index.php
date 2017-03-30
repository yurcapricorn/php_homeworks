<?php

require_once __DIR__ . '/protected/autoload.php';

$data = App\Models\Article::findLastEntries();

include __DIR__ . '/article/templates/index.html';

include __DIR__ . '/admin/templates/admin.html';