<?php

$autoloader = require __DIR__ . '/../vendor/autoload.php';

use m1n0\ConsoleTester;
use m1n0\JSONRotatorIterative;
use m1n0\JSONRotatorRecursive;

$dataShort = json_decode(file_get_contents(__DIR__ . '/../resources/MockDataShort.json'), true);
$dataLong = json_decode(file_get_contents(__DIR__ . '/../resources/MockDataLong.json'), true);

$iterativeRotator = new JSONRotatorIterative();
$recursiveRotator = new JSONRotatorRecursive();
$consoleTest = new ConsoleTester();

echo "Running with 10 records:\n\r";
$runShortOriginal = $consoleTest->run($iterativeRotator, $dataShort, FALSE);
$runShortTransposed = $consoleTest->run($iterativeRotator, $dataShort, TRUE, $runShortOriginal);
echo "Recursive transpose (keys are not preserved, comparing to no-transpose run):\n\r";
$runShortTransposedRecursive = $consoleTest->run($recursiveRotator, $dataShort, TRUE, $runShortOriginal);

echo "Running with 1000 records:\n\r";
$runLongOriginal = $consoleTest->run($iterativeRotator, $dataLong, FALSE);
$runLongTransposed = $consoleTest->run($iterativeRotator, $dataLong, TRUE, $runLongOriginal);
echo "Recursive transpose (keys are not preserved, comparing to no-transpose run):\n\r";
$runLongTransposed = $consoleTest->run($recursiveRotator, $dataLong, TRUE, $runLongOriginal);
