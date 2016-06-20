<?php

$autoloader = require __DIR__ . '/../vendor/autoload.php';

use m1n0\JSONRotator;
use m1n0\ConsoleTester;

$dataShort = json_decode(file_get_contents(__DIR__ . '/../resources/MockDataShort.json'), true);
$dataLong = json_decode(file_get_contents(__DIR__ . '/../resources/MockDataLong.json'), true);

$rotator = new JSONRotator();
$consoleTest = new ConsoleTester();

echo "Running with 10 records:\n\r";
$runShortOriginal = $consoleTest->run($rotator, $dataShort, FALSE);
$runShortTransposed = $consoleTest->run($rotator, $dataShort, TRUE, $runShortOriginal);

echo "Running with 1000 records:\n\r";
$runLongOriginal = $consoleTest->run($rotator, $dataLong, FALSE);
$runLongTransposed = $consoleTest->run($rotator, $dataLong, TRUE, $runLongOriginal);
