<?php

require_once __DIR__ . '/Article.php';
require_once __DIR__ . '/tests/Test.php';
use tests\Test;

$data = Article::findLastArticles(3);
include __DIR__ . '\templates\news_index.html';

/**
 * WARNING!
 * dbTestExecute() method adds a test record into your database!
 * make sure you want it before running!
 */
//Test::testAll();

