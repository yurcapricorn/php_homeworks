<?php

require_once __DIR__ . '/../protected/autoload.php';

$data = App\Models\Article::findAll();
include __DIR__ . '/templates/admin.html';