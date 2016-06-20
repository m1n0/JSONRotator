<?php

$autoloader = require __DIR__ . '/../vendor/autoload.php';

use m1n0\JSONRotator;
use m1n0\ConsoleTester;

$rotator = new JSONRotator();
$consoleTest = new ConsoleTester();

$runOriginal = $consoleTest->run($rotator, $data, FALSE);
$runTransposed = $consoleTest->run($rotator, $data, TRUE, $runOriginal);
