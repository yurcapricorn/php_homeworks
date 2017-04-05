<?php

namespace tests\unit;

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../protected/Autoload.php';

class TestModelTest extends TestCase {
    function testTrue() {
        $this->assertTrue(true);
    }
}
$test = new TestModelTest();
$test -> testTrue();