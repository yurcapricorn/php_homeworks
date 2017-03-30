<?php

require_once __DIR__ . '/protected/autoload.php';

$data = App\Models\Article::findLastEntries();

include __DIR__ . '/protected/modules/article/templates/index.html';

include __DIR__ . '/protected/modules/admin/templates/admin.html';