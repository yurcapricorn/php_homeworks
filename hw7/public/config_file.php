<?php
return ['db' => ['host' => 'localhost', 'name' => 'php2', 'user' => 'root', 'pass' => ''],
    'log' => __DIR__ . '/../log_file.php',
    'mail' => ['smtp' => 'smtp.mail.ru', 'port' => '465', 'encryption' => 'SSL', 'user' => 'swifttest',
        'pass' => 'foobar123', 'from' => 'swifttest@mail.ru', 'to' => 'user@gmail.com'],
    'cache' => __DIR__ . '/../cache/'
];