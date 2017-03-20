<?php

include __DIR__ . '/../autoload.php';

$n = \App\Models\News::dbElementCount();
$n=$n[0];

echo $n['count'];
