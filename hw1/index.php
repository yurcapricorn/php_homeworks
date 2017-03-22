<?php

include __DIR__ . '/autoload.php';

use tests\Test;

$data = Article::findLastArticles(3);
include 'templates\news_index.html';

/**
 * WARNING!
 * dbTestExecute() method adds a test record into your database!
 * make sure you want it before running!
 */
//Test::testAll();

